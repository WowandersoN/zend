<?php

namespace common\components;

use common\models\translate\Languages;
use yii\base\InvalidConfigException;
use yii\i18n\DbMessageSource;

class I18N extends \yii\i18n\I18N
{
    /** @var string */
    public $sourceMessageTable = '{{%source_message}}';
    /** @var string */
    public $messageTable = '{{%message}}';
    /** @var array */
    public $languages;
    /** @var array */
    public $missingTranslationHandler = ['common\models\translate\Module', 'missingTranslation'];

    public $db = 'db';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        $this->languages = Languages::getLanguages();
        if (!$this->languages) {
            throw new InvalidConfigException('You should enable some language in admin panel!');
        }
        if (!isset($this->translations['*'])) {
            $this->translations['*'] = [
                'class' => DbMessageSource::className(),
                'db' => $this->db,
                'sourceMessageTable' => $this->sourceMessageTable,
                'messageTable' => $this->messageTable,
                'on missingTranslation' => $this->missingTranslationHandler
            ];
        }
        if (!isset($this->translations['app']) && !isset($this->translations['app*'])) {
            $this->translations['app'] = [
                'class' => DbMessageSource::className(),
                'db' => $this->db,
                'sourceMessageTable' => $this->sourceMessageTable,
                'messageTable' => $this->messageTable,
                'on missingTranslation' => $this->missingTranslationHandler
            ];
        }
        parent::init();
    }
}
