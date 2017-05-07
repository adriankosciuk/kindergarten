<?php

use yii\db\Migration;

class m161116_160000_contact extends Migration
{
    public function up()
    {
        $this->createTable('contact', [
            'id' => $this->primaryKey(),
            'city' => $this->string(100)->notNull(),
            'addres' => $this->string(100)->notNull(),
            'phone_number' => $this->string(10),
            'email' => $this->string(100)
        ]);
    }

    public function down()
    {
        $this->dropTable('contact');
    }
}
