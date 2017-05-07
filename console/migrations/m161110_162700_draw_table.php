<?php

use yii\db\Migration;

class m161110_162700_draw_table extends Migration
{
    public function up()
    {
        $this->createTable('images', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'url' => $this->string(255)->notNull(),
            'image' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('images');
    }
}
