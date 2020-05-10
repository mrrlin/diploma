<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dialect".
 *
 * @property int $id
 * @property string $name
 * @property int $lang_id
 *
 * @property Lang $lang
 * @property LangRegion[] $langRegions
 */
class Dialect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dialect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lang_id'], 'required'],
            [['lang_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название диалекта',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    /**
     * Gets query for [[LangRegions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangRegions()
    {
        return $this->hasMany(LangRegion::className(), ['dialect_id' => 'id']);
    }
}
