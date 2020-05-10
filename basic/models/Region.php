<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $country_id
 *
 * @property LangRegion[] $langRegions
 * @property Country $country
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['name', 'type'], 'string', 'max' => 100],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название региона',
            'type' => 'Тип региона',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * Gets query for [[LangRegions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangRegions()
    {
        return $this->hasMany(LangRegion::className(), ['region_id' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
	
	
    /**
     * Gets query for [[Regions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangsreg()
    {
        return $this->hasMany(LangRegion::className(), ['region_id' => 'id']);
    }
}
