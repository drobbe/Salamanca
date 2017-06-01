<?php

namespace app\controllers;

use Yii;
use app\models\Quimicas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuimicasController implements the CRUD actions for Quimicas model.
 */
class QuimicasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quimicas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Quimicas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quimicas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Quimicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    /**
     * Updates an existing Quimicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCargar($id)
    {


        $model = $this->findModel($id);
                if(Yii::$app->request->isAjax && $model->load($_POST))
        {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($model);
        }
        $tipo_perfil = $model->perfil->id_tipo_perfil;
        $scenario = $tipo_perfil== 2 ? "quimicas" : "lipidico";
        $model->setScenario($scenario);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $connection = Yii::$app->db;    
            $connection->createCommand()
                ->update('perfil', ['id_estatus' => 2], 'id_perfil = '.$model->id_perfil)
                ->execute();
            sleep(1.5);
            return $this->redirect(['view', 'id' => $model->id_quimicas]);
        } else {
            return $this->render('cargar', [
                'model' => $model,
                'tipo_perfil' => $tipo_perfil,

            ]);
        }
    }


    /**
     * Deletes an existing Quimicas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quimicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quimicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quimicas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
