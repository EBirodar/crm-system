<?php

namespace common\models;

use Yii;
use \common\models\base\GroupPrice as BaseGroupPrice;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "group_price".
 */
class GroupPrice extends BaseGroupPrice
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            $related = $this->getRelatedRecords();
//            /** @var Group $group */
//            if (isset($related['group']) && $group = $related['group']) {
//                $group->save();
//                $this->group_id = $group->id;
//            }
//            return true;
//        }
//        return false;
//    }

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
    public function active()
    {
        return $this->andWhere(['status' => GroupPrice::STATUS_ACTIVE]);
    }

    public static function create(
        $group_id,
              $price
    )
    {
        $model = new GroupPrice();

        $model->group_id = $group_id;
        $model->price = $price;
        $model->status = GroupPrice::STATUS_ACTIVE;

        return $model;
    }
}
