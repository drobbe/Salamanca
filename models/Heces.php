<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "heces".
 *
 * @property integer $id_heces
 * @property integer $id_perfil
 * @property string $aspecto
 * @property string $color
 * @property string $reaccion
 * @property string $olor
 * @property string $moco
 * @property string $restos
 * @property string $sangre
 * @property string $parasitos1
 * @property string $parasitos2
 * @property string $parasitos3
 * @property string $sangre_oculta
 * @property string $azucares
 * @property integer $ph
 * @property string $observaciones
 *
 * @property Perfil $idPerfil
 */
class heces extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heces';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perfil','aspecto','color','reaccion','olor','moco','restos','sangre'], 'required','on' => 'heces'],
            [['id_perfil','aspecto','color','reaccion','olor','moco','restos','sangre','ph','sangre_oculta', 'azucares'], 'required','on' => 'diarreico'],
            [['id_perfil', 'ph'], 'integer'],
            [['observaciones'], 'string'],
            [['aspecto'], 'string', 'max' => 30],
            [['color', 'reaccion', 'olor', 'moco', 'restos', 'sangre'], 'string', 'max' => 40],
            [['parasitos1', 'parasitos2', 'parasitos3'], 'string', 'max' => 60], 
            [['sangre_oculta', 'azucares'], 'string', 'max' => 10],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_perfil']],
            [['ph'],'number','max'=>9,'min'=>3],
        ];
    }

    /**
     * @inheritdoc 
     */
    public function attributeLabels()
    {
        return [
            'id_heces' => 'Id Heces',
            'id_perfil' => 'Id Perfil',
            'aspecto' => 'Aspecto',
            'color' => 'Color',
            'reaccion' => 'Reacción',
            'olor' => 'Olor',
            'moco' => 'Moco',
            'restos' => 'Restos Alimenticios',
            'sangre' => 'Sangre',
            'parasitos1' => 'Parasitos',
            'parasitos2' => 'Otros Parasistos',
            'parasitos3' => 'Otros Parasistos',
            'sangre_oculta' => 'Sangre Oculta',
            'azucares' => 'Azucares',
            'ph' => 'Ph',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id_perfil' => 'id_perfil']);
    }

    public function getIdPerfil($id)
    {
    $rows = (new \yii\db\Query())
    ->select(['id_tipo_perfil'])
    ->from('perfil')
    ->where(['id_perfil' => $id])    
    ->all();
    return $rows;
    }
}
