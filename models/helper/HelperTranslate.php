<?php

namespace app\models\helper;

use Yii;
use yii\helpers\ArrayHelper;

class HelperTranslate
{
    const CODE_LANG_EN = 'en';
    const CODE_LANG_RU = 'ru';
    const CODE_LANG_ZH = 'zh';

    const DEFAULT_LANG = 'en';

    public static function attributeArray($attr, $default = null) {
        $attribute = [
            'languages' => [
                self::CODE_LANG_EN => 'English',
                self::CODE_LANG_RU => 'Russian',
//                self::CODE_LANG_ZH => 'Chinese',
            ]
        ];

        if(!isset($attribute[$attr]))
            return null;

        if($default !== null)
            return ArrayHelper::merge(is_array($default) ? $default : [0 => $default], $attribute[$attr]);

        return $attribute[$attr];
    }

    public static function getAllLanguages()
    {
        return [
            self::CODE_LANG_EN,
            self::CODE_LANG_RU,
//            self::CODE_LANG_ZH,
        ];
    }

    /**
     * Функция для получения заначения перевода
     *
     * @param $arr
     * @return array
     */
    public static function getKeysValueTranslate($arr)
    {
        $translates = [];
        foreach($arr as $key=>$val){
            $keys = explode('.',$key);
            $array = &$translates;

            foreach ($keys as $k){
                if(!isset($array[$k])){
                    $array[$k]=[];
                }
                $array=&$array[$k];
            }
            $array = $val;
        }

        return $translates;
    }

}
