<?php

namespace app\controllers;
use Yii;
use app\models\Individuales;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuimicasController implements the CRUD actions for Quimicas model.
 */
class IndividualesController extends Controller
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
            'query' => Individuales::find(),
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
        $tipo_perfil = $model->perfil->id_tipo_perfil;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $connection = Yii::$app->db;    
            $connection->createCommand()
                ->update('perfil', ['id_estatus' => 2], 'id_perfil = '.$model->id_perfil)
                ->execute();
            sleep(3);  
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
        if (($model = Individuales::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
