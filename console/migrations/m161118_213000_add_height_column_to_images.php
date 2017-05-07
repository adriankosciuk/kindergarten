<?php

use yii\db\Migration;

class m161118_213000_add_height_column_to_images extends Migration
{
    public function up()
    {
        $this->addColumn('images', 'width', $this->integer());
        $this->addColumn('images', 'height', $this->integer());
    }

    public function down()
    {
        //
    }
}
