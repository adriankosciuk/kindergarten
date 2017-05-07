<?php

use yii\db\Migration;

class m170104_000544_main_page_text extends Migration
{
    public function up()
    {
         $this->createTable('main_page_text', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        echo "m170104_000544_main_page_text cannot be reverted.\n";

        return false;
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
