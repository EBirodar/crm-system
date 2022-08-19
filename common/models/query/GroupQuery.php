<?php

namespace common\models\query;

use common\models\Group;

/**
 * This is the ActiveQuery class for [[\common\models\Group]].
 *
 * @see \common\models\Group
 */
class GroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    public $tableName = 'group';

    /**
     * @inheritdoc
     * @return \common\models\Group[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function active()
    {

        return $this->andWhere(["$this->tableName.status" => Group::STATUS_ACTIVE]);

    }
    /**
     * @inheritdoc
     * @return \common\models\Group|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
