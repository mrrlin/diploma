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
class GroupLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'family_id'], 'required'],
            [['parent_id', 'family_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::className(), 'targetAttribute' => ['family_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название языковой группы',
            'parent_id' => 'Parent ID',
            'family_id' => 'Family ID',
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
        return $this->hasMany(Lang::className(), ['group_id' => 'id']);
    }
}
