<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * Usuariosearch represents the model behind the search form about `app\models\Usuario`.
 */
class Usuariosearch extends Usuario
{
    public $descripcion;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_rol'], 'integer'],
            [['user', 'pass', 'nombre', 'apellido','descripcion'], 'safe'],
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
        $query = Usuario::find();

        // add conditions that should always apply here
        $query->joinWith(['rol']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         $dataProvider->sort->attributes['descripcion'] = [
         // The tables are the ones our relation are configured to
         // in my case they are prefixed with "tbl_"
         'asc' => ['rol.descripcion' => SORT_ASC],
         'desc' => ['rol.descripcion' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_usuario' => $this->id_usuario,
            'id_rol' => $this->id_rol,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'rol.descripcion', $this->descripcion]);
        return $dataProvider;
    }
}
