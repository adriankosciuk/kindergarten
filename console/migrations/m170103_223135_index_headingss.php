<?php

use yii\db\Migration;

class m170103_223135_index_headingss extends Migration
{
    public function up()
    {
         $this->createTable('main_page_headings', [
            'id' => $this->primaryKey(),
            'header' => $this->string()->notNull(),
            'content' => $this->string(340)->notNull(),
            'url' => $this->string()->notNull()
        ]);
    }

    public function down()
    {
        $this->delete('main_page_headings');
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
