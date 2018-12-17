<?php
namespace common\components;

use yii\web\UrlManager;
use frontend\models\Lang;
use Yii;

class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {

        $lang = Lang::getCurrent();

        //Получаем сформированный URL(без префикса идентификатора языка)
        $url = parent::createUrl($params);

        //Добавляем к URL префикс - буквенный идентификатор языка
        if( $url == '/' ){
            $res = '/' . $lang;
        } else {
            $res = '/' . $lang . $url;
        }
        Yii::trace($res);
        return $res;
    }
}
