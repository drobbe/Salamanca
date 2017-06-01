<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property integer $id_paciente
 * @property string $nombres
 * @property string $apellidos
 * @property integer $cedula
 * @property string $fecha_nacimiento
 * @property string $sexo
 * @property string $telefono
 * @property string $correo
 *
 * @property Perfil[] $perfils
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'cedula', 'fecha_nacimiento', 'sexo'], 'required'],
            [['cedula'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['nombres', 'apellidos'], 'string', 'max' => 50],
            [['sexo'], 'string', 'max' => 1],
            [['telefono'], 'string', 'max' => 15],
            [['correo'], 'string', 'max' => 40],
            [['cedula'], 'unique'],
            [['telefono'],'default','value'=>'No posee'],
            [['correo'],'default','value'=>'No posee'],
            [['cedula'],'number','max'=>99999999],
            array('nombres','match' ,'pattern'=>'/^[A-Za-zÑñ ]+$/u'),
            array('apellidos','match' ,'pattern'=>'/^[A-Za-zñÑ ]+$/u'),
            //[['fecha_nacimiento'],'date', 'format'=>'m/d/Y'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_paciente' => 'Id Paciente',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'cedula' => 'Cedula',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'sexo' => 'Sexo',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['id_paciente' => 'id_paciente']);
    }
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->fecha_nacimiento = str_replace("/", "-", $this->fecha_nacimiento);
            $this->fecha_nacimiento = date("d-m-Y", strtotime($this->fecha_nacimiento));       
            return true;
        } else {
            return false;
        }
    }    
}
