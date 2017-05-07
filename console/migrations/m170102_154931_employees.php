<?php

use yii\db\Migration;

class m170102_154931_employees extends Migration
{
   
    
        public function up()
    {
            $this->createTable('employees', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'name' => $this->text('150')->notNull()
        ]);
    }
    

    public function down()
    {
        $this->delete('employees');
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
