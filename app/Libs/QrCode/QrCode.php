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
    private $qrCode = null;

    public function __construct(string $text)
    {
        $this->qrCode = new EndroidQrCode($text);
    }

    public function generate()
    {
        $this->qrCode->setSize(300);

        $this->qrCode->setWriterByName('png');
        $this->qrCode->setMargin(0);
        $this->qrCode->setEncoding('UTF-8');
        $this->qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::MEDIUM);
        $this->qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $this->qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $this->qrCode->setRoundBlockSize(true);
        $this->qrCode->setValidateResult(false);

        header('Content-Type: ' . $qrCode->getContentType());
        echo $qrCode->writeString();

        // $tmpFile = __DIR__ . '/tmp/' . date('YmdHis') . str_random(6) . '.png';
        // $this->qrCode->writeFile($tmpFile);
    }
}