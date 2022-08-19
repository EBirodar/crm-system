<?php

namespace backend\modules\catalog\controllers;

use common\models\Payment;
use Yii;
use yii\helpers\Url;

/**
 * This is the class for controller "PaymentController".
 */
class PaymentController extends \backend\modules\catalog\controllers\base\PaymentController
{

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Payment;
        $model->date = date('Y-m-d H:i:s');

        try {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            } elseif (!Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

}
