<?php
namespace app\models\helper;


class UserAccessHelper extends \yii\web\User
{
    public $cookie_domain;
    public $user_token_cookie;
    public $lifetime;

    public static $sysMessage = [];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->accessChecker = new AccessChecker();
    }
}