<?php

use yii\db\Migration;

class m170102_181109_menu extends Migration
{
    public function up()
    {
$this->createTable('menu', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->delete('menu');
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
