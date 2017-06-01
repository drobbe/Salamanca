<?php

namespace app\controllers;

use Yii;
use app\models\Perfil;
use app\models\SearchPerfil;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
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
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPerfil();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        $dataProvider->query->andFilterWhere(['id_estatus' => 2,]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexanuladas()
    {
        $searchModel = new SearchPerfil();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        $dataProvider->query->andFilterWhere(['id_estatus' => 3,]);
        return $this->render('index_anuladas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexpendientes()
    {
        $searchModel = new SearchPerfil();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        $dataProvider->query->andFilterWhere(['id_estatus' => 1,]);
        return $this->render('index_pendientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
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
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */ 
    public function actionCreate()
    {
        $model = new Perfil();
 //  AQUI CUANDO GUARDO EL PERFIL AUTOMATICAMENTE HACE UN INSERT EN LAS TABLAS DE EXAMENES 

        if ($model->load(Yii::$app->request->post())&& $model->save()) {
            if (Yii::$app->request->post("checkbox")!==null){
                $glicemia = "NULL";
                $urea = "NULL";
                $creatinina = "NULL";
                $colesterol = "NULL";
                $trigliceridos = "NULL";
                $hdl_colesterol = "NULL";
                $ldl_colesterol = "NULL";
                $vldl_colesterol = "NULL";
                $acido_urico = "NULL";
                $proteinas_totales = "NULL";
                $albumina = "NULL";
                $alb_glob = "NULL";
                $globulina = "NULL";
                $bilirrubina_total = "NULL";
                $bili_directa = "NULL";
                $bili_indirecta = "NULL";
                $ast = "NULL";
                $alt = "NULL";
                $calcio_serico = "NULL";

                if (in_array("glicemia",Yii::$app->request->post("checkbox"))) {
                     $glicemia = "DEFAULT";
                }
                if (in_array("alt",Yii::$app->request->post("checkbox"))) {
                     $urea = "DEFAULT";;
                }
                if (in_array("creatinina",Yii::$app->request->post("checkbox"))) {
                     $creatinina = "DEFAULT";
                }
                if (in_array("colesterol",Yii::$app->request->post("checkbox"))) {
                     $colesterol = "DEFAULT";
                }
                if (in_array("trigliceridos",Yii::$app->request->post("checkbox"))) {
                     $trigliceridos = "DEFAULT";
                }
                if (in_array("hdl_colesterol",Yii::$app->request->post("checkbox"))) {
                     $hdl_colesterol = "DEFAULT";
                }
                if (in_array("ldl_colesterol",Yii::$app->request->post("checkbox"))) {
                     $ldl_colesterol = "DEFAULT";
                }
                if (in_array("vldl_colesterol",Yii::$app->request->post("checkbox"))) {
                     $vldl_colesterol = "DEFAULT";
                }
                if (in_array("acido_urico",Yii::$app->request->post("checkbox"))) {
                     $acido_urico = "DEFAULT";
                }
                if (in_array("proteinas_totales",Yii::$app->request->post("checkbox"))) {
                     $proteinas_totales = "DEFAULT";
                }
                if (in_array("albumina",Yii::$app->request->post("checkbox"))) {
                     $albumina = "DEFAULT";
                }
                if (in_array("alb_glob",Yii::$app->request->post("checkbox"))) {
                     $alb_glob = "DEFAULT";
                }
                if (in_array("globulina",Yii::$app->request->post("checkbox"))) {
                     $globulina = "DEFAULT";
                }
                if (in_array("bilirrubina_total",Yii::$app->request->post("checkbox"))) {
                     $bilirrubina_total = "DEFAULT";
                }
                if (in_array("bili_directa",Yii::$app->request->post("checkbox"))) {
                     $bili_directa = "DEFAULT";
                }
                if (in_array("bili_indirecta",Yii::$app->request->post("checkbox"))) {
                     $bili_indirecta = "DEFAULT";
                }
                if (in_array("ast",Yii::$app->request->post("checkbox"))) {
                     $ast = "DEFAULT";
                }
                if (in_array("alt",Yii::$app->request->post("checkbox"))) {
                     $alt = "DEFAULT";
                }
                if (in_array("calcio_serico",Yii::$app->request->post("checkbox"))) {
                     $calcio_serico = "DEFAULT";
                }
   
            }

               switch ($model->id_tipo_perfil) {
                case 1:
                     $sql = 'INSERT INTO hematologia values (DEFAULT, '.$model->id_perfil.',NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,\'\')';
                     $sql2 = 'INSERT INTO quimicas values (DEFAULT, '.$model->id_perfil.',NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,\'\')';                    
                    break;
                case 2:
                     $sql = 'INSERT INTO quimicas values (DEFAULT, '.$model->id_perfil.',NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,\'\')';
                    break;
                case 3:
                     $sql = 'INSERT INTO orina values (DEFAULT, '.$model->id_perfil.',NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,\'\')';
                    break;
                case 4:
                     $sql = 'INSERT INTO quimicas values (DEFAULT, '.$model->id_perfil.'
                         ,NULL,NULL,NULL,NULL,NULL,
                        NULL ,NULL ,NULL ,NUll ,NUll ,
                        NUll ,NUll ,NUll ,NUll ,NUll ,
                        NUll ,NUll ,NUll ,NUll ,\'\')';
                    break;
                case 5:

                     $sql = 'INSERT INTO quimicas values (DEFAULT, '.$model->id_perfil.
                        ','.$glicemia.
                        ','.$urea.
                        ','.$creatinina.
                        ','.$colesterol.
                        ','.$trigliceridos.
                        ','.$hdl_colesterol.
                        ','.$ldl_colesterol.
                        ','.$vldl_colesterol.
                        ','.$acido_urico.
                        ','.$proteinas_totales.
                        ','.$albumina.
                        ','.$alb_glob.
                        ','.$globulina.
                        ','.$bilirrubina_total.
                        ','.$bili_directa.
                        ','.$bili_indirecta.
                        ','.$ast.
                        ','.$alt.
                        ','.$calcio_serico.
                        ',\'\')';
                    break;
                    break;
                case 6:
                     $sql = 'INSERT INTO heces values (DEFAULT, '.$model->id_perfil.',DEFAULT,DEFAULT,DEFAULT,DEFAULT,DEFAULT,
                        DEFAULT,DEFAULT,DEFAULT,DEFAULT,
                        DEFAULT,NULL,NULL,NULL,\'\')';
                    break;
                case 7:
                     $sql = 'INSERT INTO heces values (DEFAULT, '.$model->id_perfil.',DEFAULT,DEFAULT,DEFAULT,DEFAULT,DEFAULT,
                        DEFAULT,DEFAULT,DEFAULT,DEFAULT,
                        DEFAULT,DEFAULT,DEFAULT,DEFAULT,\'\')';
                    break;
                case 8:
                     $sql = 'INSERT INTO hematologia values (DEFAULT, '.$model->id_perfil.',NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,NULL,
                        NULL,NULL,NULL,NULL,\'\')';
                    break;
            }
            Yii::$app->db->createCommand($sql)->queryAll();
            if (isset($sql2)){Yii::$app->db->createCommand($sql2)->queryAll();}
            sleep(1.5);
            return $this->redirect(['view', 'id' => $model->id_perfil]);
           

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_perfil]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->id_estatus = 3;
        $model->update();
        return $this->redirect(['indexanuladas']);
    }

    public function actionUndelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->id_estatus = 1;
        $model->update();
        return $this->redirect(['indexpendientes']);
    }

    public function actionPacientelista($q = null, $id = null) {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = ['results' => ['id' => '', 'text' => '']];
    if (!is_null($q)) {
        $num= 0;
        if(is_numeric($q)){
        $num =$q;
        }
        $query = new Query;
        $query->select(["CONCAT(nombres, ' ', apellidos, ' ', cedula) AS text", 'id_paciente as id']) 
            ->from('paciente')
            ->where(['ilike', 'nombres', $q])
            ->orWhere(['ilike', 'apellidos', $q])
            ->orWhere(['like', 'CAST(cedula as character varying(15))', $q])            
            ->limit(5);
        $command = $query->createCommand();
        $data = $command->queryAll();
        //WHERE    CONCAT (cedula,'::text')
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => Paciente::find($id)->nombres];
    }
    return $out;
}

    public function actionReporte()
    {
        $model = new Perfil();

        if (Yii::$app->request->post()) {

            $post = (Yii::$app->request->post());
            $inicio = ($post['inicio']);
            $inicioquery = substr($inicio, -4)."-".substr($inicio, -7,-5)."-".substr($inicio, -10,-8);
            $final = ($post['final']);
            $finalquery = substr($final, -4)."-".substr($final, -7,-5)."-".substr($final, -10,-8);
            $sql="SELECT
                    
                    tp.descripcion as name,
                    COUNT (id_perfil) as data
                FROM
                    perfil p
                INNER JOIN tipo_perfil tp ON tp.id_tipo_perfil = p.id_tipo_perfil
                WHERE
                    fecha_creacion BETWEEN '".$inicioquery."'
                AND '".$finalquery."'
                GROUP BY
                    tp.descripcion";
           


            $barras = (Yii::$app->db->createCommand($sql)->queryAll()); 
            $longitud = count($barras);
            for($i=0; $i<$longitud; $i++){
                $barras[$i]['data'] = intval($barras[$i]['data']);
                $barras[$i]['data'] = [$barras[$i]['data']];

            }        
            return $this->render('reporte', [
                    'model' => $model,
                    'query' => $barras,
                    'inicio' => $inicio,
                    'final' => $final,
                ]);


        } else {
            return $this->render('reporte', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
