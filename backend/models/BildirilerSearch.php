<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bildiriler;

/**
 * BildirilerSearch represents the model behind the search form of `backend\models\Bildiriler`.
 */
class BildirilerSearch extends Bildiriler
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['self_id', 'notice_id'], 'integer'],
            [['header', 'description', 'date', 'expired'], 'safe'],
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
        $query = Bildiriler::find();

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
            'self_id' => $this->self_id,
            'notice_id' => $this->notice_id,
            'date' => $this->date,
            'expired' => $this->expired,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
