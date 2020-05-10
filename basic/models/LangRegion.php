<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_lang".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $family_id
 *
 * @property Family $family
 * @property Lang[] $langs
 */
class LangRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lang_id', 'region_id', 'dialect_id'], 'required'],
            [['id', 'lang_id', 'region_id', 'dialect_id'], 'integer'],
            //[['name'], 'string', 'max' => 100],
            //[['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::className(), 'targetAttribute' => ['family_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang_id' => 'Название языковой группы',
            'region_id' => 'Parent ID',
            'dialect_id' => 'Family ID',
        ];
    }

    /**
     * Gets query for [[Family]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamily()
    {
        return $this->hasOne(Family::className(), ['id' => 'family_id']);
    }

    /**
     * Gets query for [[Langs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangs()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
