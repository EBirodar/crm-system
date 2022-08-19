<?php

namespace common\models\query;

use common\models\ClientPhone;

/**
 * This is the ActiveQuery class for [[\common\models\ClientPhone]].
 *
 * @see \common\models\ClientPhone
 */
class ClientPhoneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ClientPhone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function active()
    {
        return $this->andWhere(['status' => ClientPhone::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return \common\models\ClientPhone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
