<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Meeting;

/**
 * MeetingSearch represents the model behind the search form about `common\models\Meeting`.
 */
class MeetingSearch extends Meeting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'deleted'], 'integer'],
        	[['creator_id', 'updater_id', 'contact_moment_id'], 'string'],
            [['moment', 'comment', 'datetime_added', 'datetime_updated'], 'safe'],
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
        $query = Meeting::find()->joinWith(['contactMoment.customer', 'creator']);

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
//             'id' => $this->id,
//             'contact_moment_id' => $this->contact_moment_id,
//             'moment' => $this->moment,
//             'creator_id' => $this->creator_id,
//             'updater_id' => $this->updater_id,
//             'datetime_added' => $this->datetime_added,
//             'datetime_updated' => $this->datetime_updated,
//             'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'meeting.comment', $this->comment])
        	->andFilterWhere(['like', 'customer.name', $this->contact_moment_id])
        	->andFilterWhere(['like', 'user.username', $this->creator_id]);

        return $dataProvider;
    }
}
