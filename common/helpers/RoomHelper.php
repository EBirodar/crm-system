<?php


namespace common\helpers;

use common\models\Pupil;
use common\models\Room;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class RoomHelper
{
    public static function getStatusList(): array
    {
        return [
            Room::STATUS_ACTIVE => Yii::t('models', 'Актив'),
            Room::STATUS_INACTIVE => Yii::t('models', 'Неактив'),
        ];
    }

    public static function getStatusName(int $name)
    {
        return ArrayHelper::getValue(self::getStatusList(), $name);
    }
    public static function getStatusLabel($status): string
    {
        switch ($status) {
            case Pupil::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            case Pupil::STATUS_INACTIVE:
                $class = 'label label-danger';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::getStatusList(), $status), [
            'class' => $class,
        ]);
    }

    public static function getTypeList(): array
    {
        return [
            Room::TYPE_ONE => Yii::t('models', 'Маленький'),
            Room::TYPE_FIFE => Yii::t('models', 'Средний'),
            Room::TYPE_NINE => Yii::t('models', 'Бальшой'),
        ];
    }

    public static function getTypeName(int $name)
    {
        return ArrayHelper::getValue(self::getTypeList(), $name);
    }
    public static function getTypeLabel($type): string
    {
        switch ($type) {
            case Room::TYPE_ONE:
                $class = 'label label-success';
                break;
            case Room::TYPE_FIFE:
                $class = 'label label-danger';
                break;
            case Room::TYPE_NINE:
                $class = 'label label-primary';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::getTypeList(), $type), [
            'class' => $class,
        ]);
    }
}