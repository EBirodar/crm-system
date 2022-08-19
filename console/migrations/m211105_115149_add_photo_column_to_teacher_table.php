<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%teacher}}`.
 */
class m211105_115149_add_photo_column_to_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('_teacher', 'photo', $this->string(255)->after('gender'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('_teacher', 'photo');
    }
}
