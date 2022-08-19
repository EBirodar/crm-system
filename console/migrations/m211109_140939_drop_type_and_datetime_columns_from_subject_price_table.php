<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%subject_price}}`.
 */
class m211109_140939_drop_type_and_datetime_columns_from_subject_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('_subject_price', 'type');
        $this->dropColumn('_subject_price', 'datetime');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('_subject_price', 'type', $this->tinyInteger(1));
        $this->addColumn('_subject_price', 'datetime', $this->dateTime());
    }
}
