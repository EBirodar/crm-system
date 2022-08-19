<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pupil}}`.
 */
class m211019_134615_create_pupil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{_pupil}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(255)->notNull(),
            'address' => $this->string(255),
            'age' => $this->tinyInteger(),
            'phone' => $this->string('255'),
            'gender' => $this->tinyInteger(1),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{pupil}}');
    }
}
