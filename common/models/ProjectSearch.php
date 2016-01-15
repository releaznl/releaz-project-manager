<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `common\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'deleted', 'creator_id', 'updater_id', 'status'], 'integer'],
        	[['projectmanager_id', 'creator', 'updater', 'status', 'client_id'], 'string'],
            [['description', 'datetime_added', 'datetime_updated', 'name'], 'safe'],
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
    public function search($params, $query)
    {
        $query->joinWith(['projectmanager', 'client']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'project_id' => $this->project_id,
            'datetime_added' => $this->datetime_added,
            'deleted' => $this->deleted,
            'creator_id' => $this->creator_id,
//             'client_id' => $this->client_id,
//             'projectmanager_id' => $this->projectmanager_id,
            'datetime_updated' => $this->datetime_updated,
            'updater_id' => $this->updater_id,
//             'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'project.description', $this->description])
            ->andFilterWhere(['like', 'project.name', $this->name])
            ->andFilterWhere(['like', 'user.username', $this->projectmanager_id])
        	->andFilterWhere(['like', 'customer.name', $this->client_id])
        	->andFilterWhere(['like', 'project.status', $this->status]);

        return $dataProvider;
    }
}
