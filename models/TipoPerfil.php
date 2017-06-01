<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_perfil".
 *
 * @property integer $id_tipo_perfil
 * @property string $descripcion
 * @property boolean $estatus
 *
 * @property Perfil[] $perfils
 */
class TipoPerfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_perfil', 'descripcion', 'estatus'], 'required'],
            [['id_tipo_perfil'], 'integer'],
            [['estatus'], 'boolean'],
            [['descripcion'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_perfil' => 'Numero de Perfil',
            'descripcion' => 'Descripcion',
            'estatus' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['id_tipo_perfil' => 'id_tipo_perfil']);
    }
}
