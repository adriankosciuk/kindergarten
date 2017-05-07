<?php

use yii\db\Migration;

class m170102_145044_offer_page_content extends Migration
{
    public function up()
    {
            $this->createTable('offer_page_content', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->delete('offer_page_content');
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
