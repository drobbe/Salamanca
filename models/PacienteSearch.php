<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paciente;

/**
 * PacienteSearch represents the model behind the search form about `app\models\Paciente`.
 */
class PacienteSearch extends Paciente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_paciente', 'cedula'], 'integer'],
            [['nombres', 'apellidos', 'fecha_nacimiento', 'sexo', 'telefono', 'correo'], 'safe'],
            [['fecha_nacimiento'],'date', 'format'=>'d/m/Y'],            
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
        $query = Paciente::find();

        
        //$query->andFilterWhere(['like', 'nombres', 'Ad']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            //$query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_paciente' => $this->id_paciente,
            //'cedula' => $this->cedula,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        $query->andFilterWhere(['ilike', 'nombres', $this->nombres])
            ->andFilterWhere(['ilike', 'CAST(cedula as character varying(15))', $this->cedula])
            ->andFilterWhere(['ilike', 'apellidos', $this->apellidos])
            ->andFilterWhere(['ilike', 'sexo', $this->sexo])
            ->andFilterWhere(['ilike', 'telefono', $this->telefono])
            ->andFilterWhere(['ilike', 'correo', $this->correo]);

        return $dataProvider;
    }
}
