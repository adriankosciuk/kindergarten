<?php

use yii\db\Migration;

class m161211_190623_photos_gallery extends Migration
{
    public function up()
    {
        $this->createTable('photos_gallery', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->unique(),
            'image' => $this->string(),
            'created_at' => $this->dateTime(),
        ]);
    }

    public function down()
    {
        echo "m161211_190619_photos_gallery cannot be reverted.\n";

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
