<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Applicant;

/**
 * ApplicantSearch represents the model behind the search form of `backend\models\Applicant`.
 */
class ApplicantSearch extends Applicant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'user_id', 'notice_id'], 'integer'],
            [['name', 'surname', 'experienceforjob', 'cvfilelink', 'about_yourself'], 'safe'],
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
        $query = Applicant::find();

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
            'applicant_id' => $this->applicant_id,
            'user_id' => $this->user_id,
            'notice_id' => $this->notice_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'experienceforjob', $this->experienceforjob])
            ->andFilterWhere(['like', 'cvfilelink', $this->cvfilelink])
            ->andFilterWhere(['like', 'about_yourself', $this->about_yourself]);

        return $dataProvider;
    }
}
