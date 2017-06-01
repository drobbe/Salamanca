<?php

namespace app\models;

use Yii;
//use app\models\TipoPerfil;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;
/**
 * This is the model class for table "perfil".
 *
 * @property integer $id_perfil
 * @property integer $id_tipo_perfil
 * @property string $fecha_creacion
 * @property integer $id_paciente
 * @property integer $id_estatus
 * @property integer $id_usuario
 *
 * @property Heces[] $heces
 * @property Hematologia[] $hematologias
 * @property Lipidico[] $lipidicos
 * @property Orina[] $orinas
 * @property EstatusPerfil $idEstatus
 * @property Paciente $idPaciente
 * @property TipoPerfil $idTipoPerfil
 * @property Usuario $idUsuario
 * @property Quimicas[] $quimicas
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     
     */
    public $icono = '<i class="fa-lg fa fa-drivers-license-o"></i>';
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

      $icono = Icon::show('remove', ['class'=>'fa-lg'], Icon::FA); 
        return [
            [['id_tipo_perfil', ], 'required', 'message' =>$icono.'Favor Escoge un {attribute}'],
            [['fecha_creacion', 'id_paciente', 'id_estatus'], 'required'],
            [['id_tipo_perfil', 'id_paciente', 'id_estatus', 'id_usuario'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['id_estatus'], 'exist', 'skipOnError' => true, 'targetClass' => EstatusPerfil::className(), 'targetAttribute' => ['id_estatus' => 'id_status']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
            [['id_tipo_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPerfil::className(), 'targetAttribute' => ['id_tipo_perfil' => 'id_tipo_perfil']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_perfil' => 'Nº',
            'id_tipo_perfil' => 'Tipo Perfil',
            'fecha_creacion' => 'Fecha Creacion',
            'id_paciente' => 'Paciente',
            'id_estatus' => 'Estatus',
            'id_usuario' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeces()
    {
        return $this->hasMany(Heces::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHematologias()
    {
        return $this->hasMany(Hematologia::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLipidicos()
    {
        return $this->hasMany(Lipidico::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrinas()
    {
        return $this->hasMany(Orina::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstatus()
    {
        return $this->hasOne(EstatusPerfil::className(), ['id_status' => 'id_estatus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id_paciente' => 'id_paciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPerfil()
    {
        return $this->hasOne(TipoPerfil::className(), ['id_tipo_perfil' => 'id_tipo_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuimicas()
    {
        return $this->hasMany(Quimicas::className(), ['id_perfil' => 'id_perfil']);
    }
    public function getNombre()
    {
            $model=$this->usuario;
            return $model?$model->nombre." ".$model->apellido:'';
    }
    public function getNombrePaciente()
    {
            $model=$this->paciente;
            return $model?$model->nombres." ".$model->apellidos:'';
    }
    /*
    Obtener el nombre del perfil en los listview 
    */
    public function getDescripcionPerfil()
    {
      $tipoRol = TipoPerfil::find()->where(['estatus' => true])->orderBy('descripcion')->asArray()->all();    
      $perfilDescripcionLista = ArrayHelper::map($tipoRol, 'id_tipo_perfil', 'descripcion'); 
      return $perfilDescripcionLista;
    }
    /*
    Obtener el nombre completo de los pacientes 
    */
    public function getDescripcionPaciente()
    {
        
        $paciente = Paciente ::find()->all(); 
        foreach($paciente as &$nombreCompleto){
            $nombreCompleto->nombres = $nombreCompleto->nombres.' '.$nombreCompleto->apellidos;
        }   
        $PacienteDescripcionLista = ArrayHelper::map($paciente, 'id_paciente', 'nombres'); 
        return $PacienteDescripcionLista;
    }
    /*
    Obtener el Estatus de los listview 
    */
    public function getEstatusPerfil()
    {
      $estatusPerfil = EstatusPerfil::find()->orderBy('descripcion')->asArray()->all();  

      $estatusDescripcionLista = ArrayHelper::map($estatusPerfil, 'id_status', 'descripcion'); 
      return $estatusDescripcionLista;
    }
    /*
    Url del gridview
    */
    public function getUrl($id)
    {     
      switch ($id) {
      case 1:
          return "perfil20";
          break;
      case 2:
          return "quimicas";
          break;
      case 3:
          return "orina";
          break;
      case 4:
          return "quimicas";
          break;
      case 5:
          return "individuales";
          break;
      case 6:
          return "heces";
          break;
      case 7:
          return "heces";
          break;
      case 8:
          return "hematologia";
          break;
      }  
      return $id;
    }
    public function getId($q,$t)
    {     

      switch ($t) {
      case 1:
          $q =  Hematologia::findOne(['id_perfil' => $q]);
          $q = $q->id_hematologia;
          return $q;
          break;
      case 2:
          $q =  Quimicas::findOne(['id_perfil' => $q]);
          $q = $q->id_quimicas;
          return $q;
          break;
      case 3:
          $q =  Orina::findOne(['id_perfil' => $q]);
          $q = $q->id_orina;
          return $q;
          break;
      case 4:
          $q =  Quimicas::findOne(['id_perfil' => $q]);
          $q = $q->id_quimicas;
          return $q;
          break;
      case 5:
          $q =  Quimicas::findOne(['id_perfil' => $q]);
          $q = $q->id_quimicas;
          return $q;
          break;
      case 6:
          $q =  Heces::findOne(['id_perfil' => $q]);
          $q = $q->id_heces;
          return $q;
          break;
      case 7:    
          $q =  Heces::findOne(['id_perfil' => $q]);
          $q = $q->id_heces;
          return $q;
          break;
      case 8:
          $q =  Hematologia::findOne(['id_perfil' => $q]);
          $q = $q->id_hematologia;
          return $q;
          break;
      } 
      return $q;
    }    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->fecha_creacion = str_replace("/", "-", $this->fecha_creacion);
            $this->fecha_creacion = date("d-m-Y", strtotime($this->fecha_creacion));       
            return true;
        } else {
            return false;
        }
    }   

}
