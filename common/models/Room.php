<?php

namespace common\models;

use Yii;
use \common\models\base\Room as BaseRoom;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "room".
 */
class Room extends BaseRoom
{

    public function fields()
    {
        return ['id', 'name'];
    }

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const TYPE_ONE = 1;
    const TYPE_FIFE = 5;
    const TYPE_NINE = 9;

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
}
