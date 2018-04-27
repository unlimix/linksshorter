<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%statistic}}".
 *
 * @property int $id
 * @property int $link_id
 * @property string $ip
 * @property string $region
 * @property string $browser
 * @property string $os
 * @property string $datetime
 */
class Statistic extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%statistic}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link_id', 'ip', 'region', 'browser', 'os'], 'required'],
            [['link_id'], 'integer'],
            [['ip'], 'string', 'max' => 16],
            [['region'], 'string', 'max' => 50],
            [['browser'], 'string', 'max' => 200],
            [['os'], 'string', 'max' => 20],
            [['datetime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link_id' => 'Link ID',
            'ip' => 'Ip',
            'region' => 'Region',
            'browser' => 'Browser',
            'os' => 'Os',
            'datetime' => 'Os',
        ];
    }
}
