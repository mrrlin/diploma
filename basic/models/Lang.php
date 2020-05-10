<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lang".
 *
 * @property int $id
 * @property string $name
 * @property int $quantity_speaker
 * @property string $description
 * @property int $group_id
 *
 * @property Dialect[] $dialects
 * @property GroupLang $group
 * @property LangRegion[] $langRegions
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'quantity_speaker', 'description', 'group_id'], 'required'],
            [['quantity_speaker', 'group_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => GroupLang::className(), 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'quantity_speaker' => 'Количество носителей',
            'description' => 'Описание',
            'group_id' => 'Group ID',
        ];
    }

    /**
     * Gets query for [[Dialects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDialects()
    {
        return $this->hasMany(Dialect::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(GroupLang::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[LangRegions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangRegions()
    {
        return $this->hasMany(LangRegion::className(), ['lang_id' => 'id']);
    }
}
