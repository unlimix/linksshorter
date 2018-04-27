<?php

use yii\db\Migration;

/**
 * Class m180427_093449_statistic
 */
class m180427_093449_statistic extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statistic}}', [
            'id' => $this->primaryKey(),
            'link_id' => $this->integer()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
            'ip' => $this->string(16)->notNull(),
            'region' => $this->string(50)->notNull(),
            'browser' => $this->string(200)->notNull(),
            'os' => $this->string(20)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM');
        $this->createIndex('link_id', '{{%statistic}}', 'link_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%statistic}}');
    }
}
