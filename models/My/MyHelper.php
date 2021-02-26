<?php

//namespace app\models\My;

use Yii;
use app\models\User;
use yii\helpers\Url;
use yii\httpclient\Client;
use yii\web\HttpException;
use yii\imagine\Image;
use Imagine\Image\Box;
use kartik\mpdf\Pdf;
use Google\Authenticator\GoogleAuthenticator;

class MyHelper
{
    const TYPE_USER_UNKNOWN = 0;

    const API_TYPE_STRING = "string";
    const API_TYPE_INTEGER = "integer";
    const API_TYPE_FLOAT = "float";
    const API_TYPE_BOOLEAN = "boolean";
    const API_TYPE_ARRAY = "array";

    const API_METHOD_GET = "GET";
    const API_METHOD_POST = "POST";
}
