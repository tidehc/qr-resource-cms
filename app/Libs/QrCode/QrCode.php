<?php

namespace Libs\Qrcode;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode as EndroidQrCode;
use Endroid\QrCode\Response\QrCodeResponse;

/**
* 二维码类库
*/
class QrCode
{
    private $resource;
    private $qrCodeSize = 160;
    private $boxSize = 300;
    private $padding = 15;
    private $bgColor = ['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0];
    private $color = ['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0];
    private $font = __DIR__ . '/../../../vendor/endroid/qr-code/assets/fonts/noto_sans.otf';
    private $fontSize = 11;
    private $lineHeight = 1.85;
    private $x = 15;
    private $y = 200;

    public function __construct($id)
    {
        $this->resource = \App\Resource::findOrFail($id);
    }

    /**
     * 生成二维码
     * 
     * @return void
     */
    public function generate()
    {
        // 1. 生成二维码
        $text = <<<EOD
BEGIN;
CategoryId:{$this->resource->category_id};
ProductName:{$this->resource->product_name};
MenufactoringNumber:{$this->resource->menufactoring_number};
RecycleNumber:{$this->resource->recycle_number};
Toxic:{$this->resource->toxic};
PoisonCategory:{$this->resource->poison_category};
Weight:{$this->resource->weight};
Quantity:{$this->resource->quantity};
JiaoHuiRen:{$this->resource->jiao_hui_ren};
RecycleArea:{$this->resource->recycle_area}
RecycleCompany:{$this->resource->recycle_company};
RecycleTime:{$this->resource->recycle_time};
END;
EOD;
        $qrCode = new EndroidQrCode($text);
        $qrCode->setSize($this->qrCodeSize);
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(0);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::MEDIUM);
        $qrCode->setForegroundColor($this->color);
        $qrCode->setBackgroundColor($this->bgColor);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);    

        // 2. 生成容器图片，并写图片底部的文字描述
        $box = imagecreate($this->boxSize, $this->boxSize) or die("Cannot Initialize new GD image stream");
        $bgColor = imagecolorallocate($box, $this->bgColor['r'], $this->bgColor['g'], $this->bgColor['b']);
        $color = imagecolorallocate($box, $this->color['r'], $this->color['g'], $this->color['b']);
        $label = [
            '废弃资源二维码标签',
            '类别：' . $this->resource->category->display_name,
            '名称：' . $this->resource->product_name,
            '编号：' . $this->resource->recycle_number,
            '编号授权：' . $this->resource->number_auth 
        ];
        $y = $this->y;
        foreach ($label as $line) { // 循环写行
            imagettftext($box, $this->fontSize, 0, $this->x, $y, $color, $this->font, $line);
            $y += $this->fontSize * $this->lineHeight;
        }

        // 3. 拷贝二维码
        $response = new QrCodeResponse($qrCode);
        $stream = $response->getContent();
        $qrCodeImg = imagecreatefromstring($stream);
        $srcX = ($this->boxSize - $this->qrCodeSize) / 2;
        $srcY = $this->padding;
        imagecopyresized($box, $qrCodeImg, $srcX, $srcY, 0, 0, $this->qrCodeSize, $this->qrCodeSize, $this->qrCodeSize, $this->qrCodeSize);

        // 4. 向浏览器输出最终的二维码
        header("Content-type: image/png");
        ob_end_clean();
        imagepng($box);

        // 5. 销毁图片资源
        imagedestroy($qrCodeImg);
        imagedestroy($box);
    }
}