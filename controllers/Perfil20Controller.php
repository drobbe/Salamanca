<?php

namespace app\controllers;

use Yii;
use app\models\Perfil20;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Quimicas;
/**
 * Perfil20Controller implements the CRUD actions for Perfil20 model.
 */
class Perfil20Controller extends Controller
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
     * Lists all Perfil20 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Perfil20::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil20 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $valor = $model->id_perfil;
        $quimicas = Quimicas::findOne(['id_perfil' => $valor]);;
        if (!$quimicas) {
            throw new NotFoundHttpException("Error en los modelos por favor comunicar con el administrador de sistema");
        }

        return $this->render('view', [
            'model' => $model,
            'quimicas' => $quimicas,
        ]);
    }

    /**
     * Creates a new Perfil20 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Perfil20();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_hematologia]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Perfil20 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCargar($id)
    {
        $model = $this->findModel($id);

        $valor = $model->id_perfil;
        $quimicas = Quimicas::findOne(['id_perfil' => $valor]);;
        if (!$quimicas) {
            throw new NotFoundHttpException("Error en los modelos por favor comunicar con el administrador de sistema");
        }
        $quimicas->setScenario("quimicas");
        if(Yii::$app->request->isAjax && $quimicas->load($_POST) && $model->load($_POST))
        {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($quimicas,$model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save() && $quimicas->load(Yii::$app->request->post()) && $quimicas->save()) {
            $connection = Yii::$app->db;    
            $connection->createCommand()
                ->update('perfil', ['id_estatus' => 2], 'id_perfil = '.$model->id_perfil)
                ->execute();            
            return $this->redirect(['view', 'id' => $model->id_hematologia]);
        } else {
            return $this->render('cargar', [
                'model' => $model,
                'quimicas' => $quimicas,
            ]);
        }
    }

    /**
     * Deletes an existing Perfil20 model.
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
     * Finds the Perfil20 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil20 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil20::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
