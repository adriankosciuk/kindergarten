<?php

use yii\db\Migration;

class m161214_135818_photos_in_gallery extends Migration
{
    public function up()
    {
$this->createTable('photos_in_gallery', [
            'photo_id' => $this->primaryKey(),
            'gallery_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'image' => $this->string(),
        ]);
$this->addForeignKey('gallery', 'photos_in_gallery', 'gallery_id', 'photos_gallery', 'id');
    }

    public function down()
    {
        echo "m161214_135816_photos_in_gallery cannot be reverted.\n";

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
