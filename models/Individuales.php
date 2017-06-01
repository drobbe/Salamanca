<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quimicas".
 *
 * @property integer $id_quimicas
 * @property integer $id_perfil
 * @property string $glicemia
 * @property string $urea
 * @property string $creatinina
 * @property string $colesterol
 * @property string $trigliceridos
 * @property string $hdl_colesterol
 * @property string $ldl_colesterol
 * @property string $vldl_colesterol
 * @property string $acido_urico
 * @property string $proteinas_totales
 * @property string $albumina
 * @property string $alb_glob
 * @property string $globulina
 * @property string $bilirrubina_total
 * @property string $bili_directa
 * @property string $bili_indirecta
 * @property string $ast
 * @property string $alt
 * @property string $calcio_serico
 * @property string $observaciones
 *
 * @property Perfil $idPerfil
 */
class Individuales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quimicas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perfil'], 'required'],
            [['id_perfil'], 'integer'],
            [['glicemia', 'urea', 'creatinina', 'colesterol', 'trigliceridos', 'hdl_colesterol', 'ldl_colesterol', 'vldl_colesterol', 'acido_urico', 'proteinas_totales', 'albumina', 'alb_glob','globulina', 'bilirrubina_total', 'bili_directa', 'bili_indirecta', 'ast', 'alt', 'calcio_serico'], 'default'],            
            [['glicemia', 'urea', 'creatinina', 'colesterol', 'trigliceridos', 'hdl_colesterol', 'ldl_colesterol', 'vldl_colesterol', 'acido_urico', 'proteinas_totales', 'albumina', 'alb_glob', 'globulina', 'bilirrubina_total', 'bili_directa', 'bili_indirecta', 'ast', 'alt', 'calcio_serico'], 'number' , 'numberPattern' => '/^\s*[0-9]*[,]?[0-9]*[0-9]?\s*$/', 'message' => '{attribute} debe ingresar un número correcto'],
            [['observaciones'], 'string'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_perfil']],
                 ['glicemia', 'required', 'when' => function($model) {
                     return $model->glicemia != null;
                 }],
                 ['urea', 'required', 'when' => function($model) {
                     return $model->urea != null;
                 }],
                 ['creatinina', 'required', 'when' => function($model) {
                     return $model->creatinina != null;
                 }],
                 ['colesterol', 'required', 'when' => function($model) {
                     return $model->colesterol != null;
                 }],
                 ['trigliceridos', 'required', 'when' => function($model) {
                     return $model->trigliceridos != null;
                 }],
                 ['hdl_colesterol', 'required', 'when' => function($model) {
                     return $model->hdl_colesterol != null;
                 }],
                 ['ldl_colesterol', 'required', 'when' => function($model) {
                     return $model->ldl_colesterol != null;
                 }],
                 ['vldl_colesterol', 'required', 'when' => function($model) {
                     return $model->vldl_colesterol != null;
                 }],
                 ['acido_urico', 'required', 'when' => function($model) {
                     return $model->acido_urico != null;
                 }],
                 ['proteinas_totales', 'required', 'when' => function($model) {
                     return $model->proteinas_totales != null;
                 }],
                 ['albumina', 'required', 'when' => function($model) {
                     return $model->albumina != null;
                 }],
                 ['alb_glob', 'required', 'when' => function($model) {
                     return $model->alb_glob != null;
                 }],
                 ['globulina', 'required', 'when' => function($model) {
                     return $model->globulina != null;
                 }],
                 ['bilirrubina_total', 'required', 'when' => function($model) {
                     return $model->bilirrubina_total != null;
                 }],
                 ['bili_directa', 'required', 'when' => function($model) {
                     return $model->bili_directa != null;
                 }],
                 ['bili_indirecta', 'required', 'when' => function($model) {
                     return $model->bili_indirecta != null;
                 }],
                 ['ast', 'required', 'when' => function($model) {
                     return $model->ast != null;
                 }],
                 ['alt', 'required', 'when' => function($model) {
                     return $model->alt != null;
                 }],
                 ['calcio_serico', 'required', 'when' => function($model) {
                     return $model->calcio_serico != null;
                 }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_quimicas' => 'Id Quimicas',
            'id_perfil' => 'Id Perfil',
            'glicemia' => 'Glicemia',
            'urea' => 'Urea',
            'creatinina' => 'Creatinina',
            'colesterol' => 'Colesterol',
            'trigliceridos' => 'Trigliceridos',
            'hdl_colesterol' => 'Hdl Colesterol',
            'ldl_colesterol' => 'Ldl Colesterol',
            'vldl_colesterol' => 'Vldl Colesterol',
            'acido_urico' => 'Acido Urico',
            'proteinas_totales' => 'Proteinas Totales',
            'albumina' => 'Albumina',
            'alb_glob' => 'Alb Glob',
            'globulina' => 'Globulina',
            'bilirrubina_total' => 'Bilirrubina Total',
            'bili_directa' => 'Bili Directa',
            'bili_indirecta' => 'Bili Indirecta',
            'ast' => 'Ast',
            'alt' => 'Alt',
            'calcio_serico' => 'Calcio Serico',
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
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->glicemia                      = str_replace(",", ".", $this->glicemia         );
            $this->urea                          = str_replace(",", ".", $this->urea             );
            $this->creatinina                    = str_replace(",", ".", $this->creatinina       );
            $this->colesterol                    = str_replace(",", ".", $this->colesterol       );
            $this->trigliceridos                 = str_replace(",", ".", $this->trigliceridos    );
            $this->hdl_colesterol                = str_replace(",", ".", $this->hdl_colesterol   );
            $this->ldl_colesterol                = str_replace(",", ".", $this->ldl_colesterol   );
            $this->vldl_colesterol               = str_replace(",", ".", $this->vldl_colesterol  );
            $this->acido_urico                   = str_replace(",", ".", $this->acido_urico      );
            $this->proteinas_totales             = str_replace(",", ".", $this->proteinas_totales);
            $this->albumina                      = str_replace(",", ".", $this->albumina         );
            $this->alb_glob                      = str_replace(",", ".", $this->alb_glob         );
            $this->globulina                     = str_replace(",", ".", $this->globulina        );
            $this->bilirrubina_total             = str_replace(",", ".", $this->bilirrubina_total);
            $this->bili_directa                  = str_replace(",", ".", $this->bili_directa     );
            $this->bili_indirecta                = str_replace(",", ".", $this->bili_indirecta   );
            $this->ast                           = str_replace(",", ".", $this->ast              );
            $this->alt                           = str_replace(",", ".", $this->alt              );
            $this->calcio_serico                 = str_replace(",", ".", $this->calcio_serico    );  
            return true;
        } else {
            return false;
        }
    }
}
