<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family".
 *
 * @property int $id
 * @property string $name
 *
 * @property GroupLang[] $groupLangs
 */
class Family extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название семьи языков',
        ];
    }

    /**
     * Gets query for [[GroupLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroupLangs()
    {
        return $this->hasMany(GroupLang::className(), ['family_id' => 'id']);
    }
}
