<?php

namespace app\controllers;

use Yii;
use app\models\Heces;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HecesController implements the CRUD actions for Heces model.
 */
class HecesController extends Controller
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
     * Lists all Heces models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Heces::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Heces model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $tipo_perfil = $model->getIdPerfil($model->id_perfil);
        $tipo_perfil=  $tipo_perfil[0]['id_tipo_perfil'];
        return $this->render('view', [
            'model' => $this->findModel($id),
            'tipo_perfil' => $tipo_perfil,
        ]);
    }

    /**
     * Creates a new Heces model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Heces();

 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_heces]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Heces model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionCargar($id)
    {

        $model = $this->findModel($id);
        $tipo_perfil = $model->perfil->id_tipo_perfil;
        $scenario =  $tipo_perfil == 7 ?  "diarreico" : "heces";
        $model->setScenario($scenario);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $connection = Yii::$app->db;    
            $connection->createCommand()
                ->update('perfil', ['id_estatus' => 2], 'id_perfil = '.$model->id_perfil)
                ->execute();
            sleep(1.5);
            return $this->redirect(['view', 'id' => $model->id_heces]);
        } else {
            return $this->render('cargar', array(
                'tipo_perfil' => $tipo_perfil,
                'model' => $model,
            ));
        }
    }

    /**
     * Deletes an existing Heces model.
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
     * Finds the Heces model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Heces the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Heces::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
