<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_perfil".
 *
 * @property integer $id_status
 * @property string $descripcion
 *
 * @property Perfil[] $perfils
 */
class EstatusPerfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estatus_perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_status', 'descripcion'], 'required'],
            [['id_status'], 'integer'],
            [['descripcion'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status' => 'Id Status',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['id_estatus' => 'id_status']);
    }
}
