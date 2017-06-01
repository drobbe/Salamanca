<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orina".
 *
 * @property integer $id_orina
 * @property integer $id_perfil
 * @property string $aspecto
 * @property string $color
 * @property string $densidad
 * @property string $reaccion
 * @property string $ph
 * @property string $proteina
 * @property string $hemoglobina
 * @property string $glucosa
 * @property string $bilirrubina
 * @property string $urobilinogeno
 * @property string $nitritos
 * @property string $cuerpos_cetonicos
 * @property string $celulas_leucariotas
 * @property string $celulas_epiteliales_planas
 * @property string $leucocitos
 * @property string $heamaties
 * @property string $bacterias
 * @property string $muscina
 * @property string $observaciones
 *
 * @property Perfil $idPerfil
 */
class Orina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aspecto', 'color', 'reaccion', 'proteina', 'hemoglobina', 'glucosa', 'bilirrubina', 'urobilinogeno', 'nitritos', 'cuerpos_cetonicos', 'celulas_leucariotas', 'bacterias', 'muscina','densidad', 'ph','celulas_epiteliales_planas', 'leucocitos', 'heamaties'], 'required'],
            [['id_perfil'], 'integer'],
            [['densidad', 'ph'], 'number'],
            [['observaciones'], 'string'],
            [['aspecto', 'color', 'reaccion', 'proteina', 'hemoglobina', 'glucosa', 'bilirrubina', 'urobilinogeno', 'nitritos', 'cuerpos_cetonicos', 'celulas_leucariotas', 'bacterias', 'muscina'], 'string', 'max' => 40],
            [['celulas_epiteliales_planas', 'leucocitos', 'heamaties'], 'string', 'max' => 3],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_perfil']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_orina' => 'Id Orina',
            'id_perfil' => 'Id Perfil',
            'aspecto' => 'Aspecto',
            'color' => 'Color',
            'densidad' => 'Densidad',
            'reaccion' => 'Reaccion',
            'ph' => 'Ph',
            'proteina' => 'Proteina',
            'hemoglobina' => 'Hemoglobina',
            'glucosa' => 'Glucosa',
            'bilirrubina' => 'Bilirrubina',
            'urobilinogeno' => 'Urobilinogeno',
            'nitritos' => 'Nitritos',
            'cuerpos_cetonicos' => 'Cuerpos Cetonicos',
            'celulas_leucariotas' => 'Celulas Leucariotas',
            'celulas_epiteliales_planas' => 'Celulas Epiteliales',
            'leucocitos' => 'Leucocitos',
            'heamaties' => 'Heamaties',
            'bacterias' => 'Bacterias',
            'muscina' => 'Muscina',
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
}
