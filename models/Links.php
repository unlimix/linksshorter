<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%links}}".
 *
 * @property int $id
 * @property string $create_at
 * @property string $link
 * @property string $short_link
 */
class Links extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%links}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'link', 'short_link'], 'required'],
            [['create_at'], 'safe'],
            [['link'], 'string'],
            [['short_link'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Create At',
            'link' => 'Link',
            'short_link' => 'Short Link',
        ];
    }
}
