<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hematologia".
 *
 * @property integer $id_hematologia
 * @property integer $id_perfil
 * @property string $globulos_blancos
 * @property string $segmentados
 * @property string $linfocitos
 * @property string $monocitos
 * @property string $eosinofilos
 * @property string $globulos_rojos
 * @property string $hemoglobina
 * @property string $hematocritos
 * @property string $vcm
 * @property string $hcm
 * @property string $chcm
 * @property string $rdw
 * @property string $vpm
 * @property integer $plaquetas
 * @property string $observaciones
 *
 * @property Perfil $idPerfil
 */
class Hematologia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hematologia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perfil','globulos_blancos', 'segmentados', 'linfocitos', 'monocitos', 'eosinofilos', 'globulos_rojos', 'hemoglobina', 'hematocritos', 'vcm', 'hcm', 'chcm', 'rdw', 'vpm','plaquetas'], 'required'],
            [['id_perfil', 'plaquetas'], 'integer'],
            [['globulos_blancos', 'segmentados', 'linfocitos', 'monocitos', 'eosinofilos', 'globulos_rojos', 'hemoglobina', 'hematocritos', 'vcm', 'hcm', 'chcm', 'rdw', 'vpm'], 'number' , 'numberPattern' => '/^\s*[0-9]*[,]?[0-9]?\s*$/'],
            [['observaciones'], 'string'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_perfil']],
            //[['globulos_blancos','plaquetas']]
            [['globulos_blancos', 'segmentados', 'linfocitos', 'monocitos', 'eosinofilos', 'globulos_rojos', 'hemoglobina', 'hematocritos', 'vcm', 'hcm', 'chcm', 'rdw', 'vpm'], 'validateCampos'],
        ];
    }

    public function validateCampos($attribute, $params)
    {       //if (intval(str_replace(".", ",",$model->colesterol)> 999)){
            if ((intval(str_replace(".", ",",$this->$attribute)> 999))){
            $this->addError($attribute,$attribute.' Es Mayor a lo Esperado');
            }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hematologia' => 'Id Hematologia',
            'id_perfil' => 'Id Perfil',
            'globulos_blancos' => 'Globulos Blancos - Leucocitos',
            'segmentados' => 'Segmentados',
            'linfocitos' => 'Linfocitos',
            'monocitos' => 'Monocitos',
            'eosinofilos' => 'Eosinofilos',
            'globulos_rojos' => 'Globulos Rojos - Hematies',
            'hemoglobina' => 'Hemoglobina',
            'hematocritos' => 'Hematocritos',
            'vcm' => 'V.C.M',
            'hcm' => 'H.C.M',
            'chcm' => 'C.H.C.M',
            'rdw' => 'R.D.W',
            'vpm' => 'V.P.M',
            'plaquetas' => 'Plaquetas',
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
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->globulos_blancos = str_replace(",", ".", $this->globulos_blancos);
            $this->segmentados = str_replace(",", ".", $this->segmentados);
            $this->linfocitos = str_replace(",", ".", $this->linfocitos);
            $this->monocitos = str_replace(",", ".", $this->monocitos);
            $this->eosinofilos = str_replace(",", ".", $this->eosinofilos);
            $this->globulos_rojos = str_replace(",", ".", $this->globulos_rojos);
            $this->hemoglobina = str_replace(",", ".", $this->hemoglobina);
            $this->hematocritos = str_replace(",", ".", $this->hematocritos);
            $this->vcm = str_replace(",", ".", $this->vcm);
            $this->chcm = str_replace(",", ".", $this->chcm);
            $this->hcm = str_replace(",", ".", $this->hcm);
            $this->rdw = str_replace(",", ".", $this->rdw);
            $this->vpm = str_replace(",", ".", $this->vpm);          
            return true;
        } else {
            return false;
        }
    }
}
