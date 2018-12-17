<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "wine".
 *
 * @property int $id
 * @property int $id_ex
 * @property int $popularity
 * @property string $name_ru
 * @property string $name_en
 * @property string $type_ru
 * @property string $type_en
 * @property string $brand_ru
 * @property string $brand_en
 * @property string $region
 * @property int $price
 * @property int $year
 */
class Wine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ex', 'popularity', 'brand_ru', 'brand_en', 'region', 'price', 'year'], 'required'],
            [['id_ex', 'popularity', 'price', 'year'], 'integer'],
            [['name_ru', 'name_en'], 'string', 'max' => 255],
            [['type_ru', 'type_en'], 'string', 'max' => 10],
            [['brand_ru', 'brand_en'], 'string', 'max' => 25],
            [['region'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ex' => 'Id Ex',
            'popularity' => 'Popularity',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'type_ru' => 'Type Ru',
            'type_en' => 'Type En',
            'brand_ru' => 'Brand Ru',
            'brand_en' => 'Brand En',
            'region' => 'Region',
            'price' => 'Price',
            'year' => 'Year',
        ];
    }
}
