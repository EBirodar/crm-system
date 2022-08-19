<?php

namespace common\models\query;

use common\models\SubjectPrice;

/**
 * This is the ActiveQuery class for [[\common\models\SubjectPrice]].
 *
 * @see \common\models\SubjectPrice
 */
class SubjectPriceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\SubjectPrice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\SubjectPrice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function active()
    {
        return $this->andWhere(['status' => SubjectPrice::STATUS_ACTIVE]);
    }

    public function inactive()
    {
        return $this->andWhere(['status' => SubjectPrice::STATUS_INACTIVE]);
    }

    public function bySubjectId(int $subject_id)
    {
        return $this->andWhere(['subject_id' => $subject_id]);
    }

    public function orderById($type = SORT_DESC)
    {
        return $this->orderBy(['id' => $type]);
    }
}
