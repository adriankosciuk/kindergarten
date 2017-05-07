<?php

use yii\db\Migration;

class m170103_135431_slides extends Migration {

    public function up() {
        $this->createTable('slides', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'image' => $this->string(),
        ]);
    }

    public function down() {
        $this->delete('slides');
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
