<?php

namespace Libs\Qrcode;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode as EndroidQrCode;
use Endroid\QrCode\Response\QrCodeResponse;

/**
* ��ά�����
*/
class QrCode
{
    private $resource; // Ҫ���ƶ�ά�����Դģ��ʵ��
    private $qrCodeSize = 255; // ��ά��ߴ�
    private $boxSize = 300; // ��ά�������ͼƬ�ĳߴ�
    private $padding = 15; // ����ͼƬ�������
    private $bgColor = ['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]; // ��ά�루������ͼƬ���ı���ɫ
    private $color = ['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0];// ��ά�루������ͼƬ�����ı�ɫ
    private $font = __DIR__ . '/../../../vendor/endroid/qr-code/assets/fonts/noto_sans.otf'; // �����ļ�·��
    private $fontSize = 12; // ����ߴ�
    private $lineHeight = 1.85; // ��ά���ǩ�ж���ʱ���и�

    public function __construct($id)
    {
        $this->resource = \App\Resource::findOrFail($id);
    }

    /**
     * ���ɶ�ά��
     * 
     * @param  boolean $isMultiLines ���ֱ�ǩ������Ϣ�Ƿ���С�Ĭ��false�������С�
     * @return void
     */
    public function generate(boolean $isMultiLines = null)
    {
        // 1. ���ɶ�ά��
        $text = <<<EOD
CategoryId:{$this->resource->category_id};
ProductName:{$this->resource->product_name};
MenufactoringNumber:{$this->resource->menufactoring_number};
NumberAuth:{$this->resource->number_auth};
RecycleNumber:{$this->resource->recycle_number};
Toxic:{$this->resource->toxic};
PoisonCategory:{$this->resource->poison_category};
Weight:{$this->resource->weight};
Quantity:{$this->resource->quantity};
JiaoHuiRen:{$this->resource->jiao_hui_ren};
RecycleArea:{$this->resource->recycle_area};
RecycleCompany:{$this->resource->recycle_company};
RecycleTime:{$this->resource->recycle_time};
EOD;
        $qrCode = new EndroidQrCode($text);
        $qrCode->setSize($this->qrCodeSize);
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(0);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::LOW);
        $qrCode->setForegroundColor($this->color);
        $qrCode->setBackgroundColor($this->bgColor);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);

        // 2. ��������ͼƬ
        $box = imagecreate($this->boxSize, $this->boxSize) or die("Cannot Initialize new GD image stream");
        $bgColor = imagecolorallocate($box, $this->bgColor['r'], $this->bgColor['g'], $this->bgColor['b']);
        $color = imagecolorallocate($box, $this->color['r'], $this->color['g'], $this->color['b']);

        // 3. ������ά��
        $response = new QrCodeResponse($qrCode);
        $stream = $response->getContent();
        $qrCodeImg = imagecreatefromstring($stream);
        $srcX = ($this->boxSize - $this->qrCodeSize) / 2; // ��ά��ˮƽ����
        $srcY = $isMultiLines ? 0 : ($this->boxSize - $this->qrCodeSize) / 2 - $this->padding; // ���б�ǩʱ����ά��������У����� $this->padding ֵ
        imagecopyresized($box, $qrCodeImg, $srcX, $srcY, 0, 0, $this->qrCodeSize, $this->qrCodeSize, $this->qrCodeSize, $this->qrCodeSize);

        // 4. дͼƬ�ײ�����������
        if (! $isMultiLines) {
            $label = [
                $this->resource->recycle_number // ���ձ��
            ];
        } else {
            $label = [
                '������Դ��ά���ǩ',
                '���' . $this->resource->category->display_name,
                '���ƣ�' . $this->resource->product_name,
                '��ţ�' . $this->resource->recycle_number,
                '�����Ȩ��' . $this->resource->number_auth 
            ];
        }
        
        if ($isMultiLines) {
            $x = $this->padding;
        } else {
            $lineWidth = imagefontwidth($this->fontSize) * mb_strlen($label[0], 'UTF-8');
            $x = ($this->boxSize - $lineWidth) / 2 - $this->padding / 2;
        }
        $y = $srcY + $this->qrCodeSize + $this->padding * 2;
        foreach ($label as $line) { // ѭ��д��
            imagettftext($box, $this->fontSize, 0, $x, $y, $color, $this->font, $line);
            $y += $this->fontSize * $this->lineHeight;
        }

        // 5. �������������յĶ�ά��
        header("Content-type: image/png");
        ob_end_clean();
        imagepng($box);

        // 6. ����ͼƬ��Դ
        imagedestroy($qrCodeImg);
        imagedestroy($box);
    }
}