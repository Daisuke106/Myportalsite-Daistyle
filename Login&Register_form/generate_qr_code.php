<?php //qr.php

require_once( __DIR__ . '../../vendor/autoload.php' );

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

$data_string = "https://white-sesame.jp";

$qr_code = QrCode::create( $data_string )
    -> setEncoding( new Encoding( 'UTF-8' ) )
    -> setErrorCorrectionLevel( new ErrorCorrectionLevelLow() )
    -> setSize( 300 )
    -> setMargin( 30 )
    -> setRoundBlockSizeMode( new RoundBlockSizeModeMargin() )
    -> setForegroundColor( new Color( 0, 0, 0 ) )
    -> setBackgroundColor( new Color( 255, 255, 255 ) );

$writer = new PngWriter();
$result = $writer->write( $qr_code );
header('Content-Type: '.$result->getMimeType());
echo $result->getString();
?>
