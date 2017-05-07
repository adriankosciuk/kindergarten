<?php

use yii\db\Migration;

class m161130_134700_add_visit_time_to_contact extends Migration
{
    private $tableName = 'contact';

    public function up() {
        $this->addColumn($this->tableName, 'DuringTheWeek', $this->string());
        $this->addColumn($this->tableName, 'ForTheWeekend', $this->string());
    }

    public function down()
    {
        echo "m161130_134700_add_visit_time_to_contact cannot be reverted.\n";

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
