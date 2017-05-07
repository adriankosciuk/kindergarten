<?php

use yii\db\Migration;

class m161211_165312_kid_application_form extends Migration {

    public function up() {
        $this->createTable('preschooler_data', [
            'id' => $this->primaryKey(),
            'school_year' => $this->string(100)->notNull(),
            'name' => $this->string(100)->notNull(),
            'surname' => $this->string(100)->notNull(),
            'birthday' => $this->date()->notNull(),
            'pesel' => $this->string(100)->notNull()->unique(),
            'parent_address_city' => $this->string(100)->notNull(),
            'parent_address_route' => $this->string(100)->notNull(),
            'phone_number' => $this->string(100)->notNull()->unique(),
            'parent_work_place' => $this->string(100),
            'phone_work_number' => $this->string(100),
            'contact_email' => $this->string(100)->unique(),
        ]);
    }

    public function down() {
        echo "m161211_165311_kid_application_form cannot be reverted.\n";

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
