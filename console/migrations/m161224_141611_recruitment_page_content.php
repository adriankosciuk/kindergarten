<?php

use yii\db\Migration;

class m161224_141611_recruitment_page_content extends Migration {

    public function up() {
        $this->createTable('recruitment_page_content', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
        ]);
    }

    public function down() {
        echo "m161224_141611_recruitment_page_content cannot be reverted.\n";

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
