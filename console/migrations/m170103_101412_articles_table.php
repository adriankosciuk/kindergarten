<?php

use yii\db\Migration;

class m170103_101412_articles_table extends Migration
{
    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'image' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime(),
        ]);
    }

    public function down()
    {
       $this->delete('articles');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
