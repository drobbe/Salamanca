<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perfil;

/**
 * SearchPerfil represents the model behind the search form about `app\models\Perfil`.
 */
class SearchPerfil extends Perfil
{
    public $paciente;
    public $cedula;
    public $perfil;
    public $usuario;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perfil', 'id_tipo_perfil', 'id_paciente', 'id_estatus', 'id_usuario'], 'integer'],
            [['fecha_creacion','paciente','cedula','perfil','usuario'], 'safe'],
            [['fecha_creacion'],'date', 'format'=>'d/m/Y'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Perfil::find();
       // $query->andFilterWhere(['=', 'id_estatus','1']);
        $query->joinWith(['paciente']);
        $query->joinWith(['tipoPerfil']);
        $query->joinWith(['usuario']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         $dataProvider->sort->attributes['paciente'] = [
             'asc' => ['paciente.nombres' => SORT_ASC],
             'desc' => ['paciente.nombres' => SORT_DESC],
        ];
         $dataProvider->sort->attributes['cedula'] = [
             'asc' => ['paciente.cedula' => SORT_ASC],
             'desc' => ['paciente.cedula' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['perfil'] = [
             'asc' => ['tipo_perfil.descripcion' => SORT_ASC],
             'desc' => ['tipo_perfil.descripcion' => SORT_DESC],
        ];        
        $dataProvider->sort->attributes['usuario'] = [
             'asc' => ['usuario.nombre' => SORT_ASC],
             'desc' => ['usuario.nombre' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_perfil' => $this->id_perfil,
            'id_tipo_perfil' => $this->id_tipo_perfil,
            'fecha_creacion' => $this->fecha_creacion,
            'id_paciente' => $this->id_paciente,
            'id_estatus' => $this->id_estatus,
            'id_usuario' => $this->id_usuario,

        ])

            ->andFilterWhere(['ilike', 'tipo_perfil.descripcion', $this->perfil])
            ->andFilterWhere([':: TEXT like', 'paciente.cedula', '%'.$this->cedula.'%'])
            ->andFilterWhere(['or',['ilike','usuario.nombre',$this->usuario],
                                   ['ilike','usuario.apellido',$this->usuario]])           
            ->andFilterWhere(['or',['ilike','paciente.nombres',$this->paciente],
                                   ['ilike','paciente.apellidos',$this->paciente]]);

        return $dataProvider;
    }
}
