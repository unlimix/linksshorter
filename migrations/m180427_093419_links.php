<?php

use yii\db\Migration;

/**
 * Class m180427_093419_links
 */
class m180427_093419_links extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%links}}', [
            'id' => $this->primaryKey(),
            'create_at' => $this->dateTime()->notNull(),
            'link' => $this->text()->notNull(),
            'short_link' => $this->string(5)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=MyISAM');
        $this->createIndex('short_link', '{{%links}}', 'short_link');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%links}}');
    }
}
