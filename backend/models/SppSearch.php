<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\spp;

/**
 * SppSearch represents the model behind the search form of `backend\models\spp`.
 */
class SppSearch extends spp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nisn'], 'integer'],
            [['nominal', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = spp::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nisn' => $this->nisn,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'nominal', $this->nominal]);

        return $dataProvider;
    }
}
