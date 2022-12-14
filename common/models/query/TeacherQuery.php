<?php

namespace common\models\query;

use common\models\Teacher;

/**
 * This is the ActiveQuery class for [[\common\models\Teacher]].
 *
 * @see \common\models\Teacher
 */
class TeacherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Teacher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Teacher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function active()
    {
        return $this->andWhere(['status' => Teacher::STATUS_ACTIVE]);
    }
}
