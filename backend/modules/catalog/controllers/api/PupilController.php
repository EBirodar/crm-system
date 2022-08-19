<?php

namespace backend\modules\catalog\controllers\api;

/**
* This is the class for REST controller "PupilController".
*/
use common\models\Pupil;
use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PupilController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Pupil';


}
