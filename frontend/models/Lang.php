<?php
namespace frontend\models;

use Yii;

class Lang
{
    static $current = null;

    static function getLang(){
        return self::$defaultLang;
    }

    static function getCurrent()
    {
        if (self::$current === null || self::$current == ''){
//            $cookies = Yii::$app->request->cookies;
//            $lang = $cookies->getValue('language');
            $lang = Yii::$app->language;

            if($lang == false){
                self::$current = self::getDefaultLang();
            }else{
                self::$current = $lang;
            }
        }
//        Yii::trace(self::$current);

        return self::$current;
    }

    static function getDefaultLang()
    {
        return Yii::$app->params['defaultLang'];
    }

    static function findOne($lang)
    {
        return in_array($lang, Yii::$app->params['langs']) ? $lang : null;
    }

    static function setCurrent($lang = null)
    {
        $cookies = Yii::$app->response->cookies;

        if($lang != false){
            $cookies->add(new \yii\web\Cookie([
                'name' => 'language',
                'value' => $lang,
            ]));
            Yii::$app->language = $lang;
        }else{
            if(Yii::$app->request->cookies->getValue('language') == false){
                $cookies->add(new \yii\web\Cookie([
                    'name' => 'language',
                    'value' => self::getDefaultLang(),
                ]));
            }
            Yii::$app->language = self::getDefaultLang();

        }
    }
}
