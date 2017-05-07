<?php

use yii\db\Migration;

class m161201_202025_email_send extends Migration {

    public function up() {
        $this->createTable('send_email', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'email' => $this->string(60)->notNull(),
            'subject' => $this->string(60),
            'message' => $this->text(),
            'post_date' => $this->dateTime(),
        ]);
    }

    public function down() {
       $this->dropTable('send_email');                                                                                                                                                                                                                                                                                                                                                                                                                                      
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
