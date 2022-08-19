<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject_price}}`.
 */
class m211105_144944_create_subject_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->createTable('{{_subject_price}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer()->notNull(),
            'type' => $this->tinyInteger(1),
            'datetime' => $this->dateTime(),
            'price' => $this->bigInteger()->defaultValue(0),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-subject_price-subject_id',
            '_subject_price',
            'subject_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-subject_price-subject_id',
            '_subject_price',
            'subject_id',
            '_subject',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-subject_price-subject_id',
            '_subject_price'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-subject_price-subject_id',
            '_subject_price'
        );

        $this->dropTable('{{_subject_price}}');
    }
}
