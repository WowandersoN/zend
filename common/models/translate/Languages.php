<?php

namespace common\models\translate;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\i18n\MissingTranslationEvent;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $visible;
 * @property int $created_at
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            [['created_at', 'visible'], 'integer'],
            [['name', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'text' => Yii::t('app', 'Text'),
            'visible' => Yii::t('app', 'Visible'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public static function getLanguages(){
        $langs = self::find()->where(['visible' => 1])->all();
        $res = [];
        foreach ($langs as $lang){
            $res[] = $lang->name;
        }
        return $res;
    }

    public function reloadMessages(){
        $messages = SourceMessage::find()->all();
        foreach ($messages as $message){
            $event = new MissingTranslationEvent();
            $event->message = $message->message;
            $event->category = $message->category;
            $event->language = $this->name;
            Module::missingTranslation($event);
        }
    }
}
