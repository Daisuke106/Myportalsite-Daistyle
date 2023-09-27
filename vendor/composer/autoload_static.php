<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73170d582ebe8487b0d684e2270838f9
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        '0bc4ff35c7c3a1f00576af338d44d67e' => __DIR__ . '/..' . '/paypayopa/php-sdk/src/helpers/utility_hmac.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'PayPay\\OpenPaymentAPI\\Controller\\' => 33,
            'PayPay\\OpenPaymentAPI\\' => 22,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'E' => 
        array (
            'Endroid\\QrCode\\' => 15,
        ),
        'D' => 
        array (
            'DASPRiD\\Enum\\' => 13,
        ),
        'B' => 
        array (
            'BaconQrCode\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'PayPay\\OpenPaymentAPI\\Controller\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypayopa/php-sdk/src/Controllers',
        ),
        'PayPay\\OpenPaymentAPI\\' => 
        array (
            0 => __DIR__ . '/..' . '/paypayopa/php-sdk/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Endroid\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/endroid/qrcode/src',
        ),
        'DASPRiD\\Enum\\' => 
        array (
            0 => __DIR__ . '/..' . '/dasprid/enum/src',
        ),
        'BaconQrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/bacon/bacon-qr-code/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PayPay\\OpenPaymentAPI\\Controller\\ClientControllerException' => __DIR__ . '/..' . '/paypayopa/php-sdk/src/core/ClientControllerException.php',
        'PayPay\\OpenPaymentAPI\\Controller\\Controller' => __DIR__ . '/..' . '/paypayopa/php-sdk/src/core/Controller.php',
        'PayPay\\OpenPaymentAPI\\Models\\Model' => __DIR__ . '/..' . '/paypayopa/php-sdk/src/core/Model.php',
        'PayPay\\OpenPaymentAPI\\Models\\ModelException' => __DIR__ . '/..' . '/paypayopa/php-sdk/src/core/ModelException.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit73170d582ebe8487b0d684e2270838f9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73170d582ebe8487b0d684e2270838f9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit73170d582ebe8487b0d684e2270838f9::$classMap;

        }, null, ClassLoader::class);
    }
}
