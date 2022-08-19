<?php

namespace backend\modules\catalog\controllers;

use common\models\Pupil;
use common\models\search\PupilSearch;
use Yii;
use yii\helpers\Url;
use yii\web\Response;

/**
 * This is the class for controller "PupilController".
 */
class PupilController extends \backend\modules\catalog\controllers\base\PupilController
{
    /**
     * Lists all Pupil models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = Pupil::find()->all();
        return $this->render('index', [
            'model'=>$model

        ]);
    }

    /**
     * Creates a new Pupil model.
     * If
     * */
    public function actionCreate()
    {
            $model = new Pupil();
            yii::$app->response->format = Response::FORMAT_JSON;
            if (yii::$app->request->isAjax){
                $result['status'] = false;
                if ($model->load(Yii::$app->request->post()) &&  $model->save()) {
                    $result['status'] = true;
                    return $result;
                }
               $result['content'] = $this->renderAjax('create',['model'=>$model]);
                return $result;
            }
            return $this->render('create',['model'=>$model]);

    }

    public function actionTest()
    {
        return $this->render('test');
    }


    /**
     * Updates an existing Pupil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST) && $model->save()) {
            if (Yii::$app->getRequest()->getIsPjax()) {
                return $this->redirect(['index'], 200);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = Pupil::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Pupil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', Yii::t('ui', "malumot uchirildi"));
            return $this->redirect(['cart/index']);
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(['index']);
        }
    }
}
