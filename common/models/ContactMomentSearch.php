<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContactMoment;

/**
 * ContactMomentSearch represents the model behind the search form about `common\models\ContactMoment`.
 */
class ContactMomentSearch extends ContactMoment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'deleted'], 'integer'],
        	[['customer_id',  'creator_id', 'updater_id'], 'string'],
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
        $query = ContactMoment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->joinWith([
            		'customer', 
            		'creator', 
//             		'updater',
            ]),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'moment' => $this->moment,
//             'customer_id' => $this->customer_id,
//             'creator_id' => $this->creator_id,
            'updater_id' => $this->updater_id,
            'datetime_added' => $this->datetime_added,
            'datetime_updated' => $this->datetime_updated,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'contact_moment.comment', $this->comment])
        	->andFilterWhere(['like', 'user.username', $this->creator_id])
        	->andFilterWhere(['like', 'customer.name', $this->customer_id]);

        return $dataProvider;
    }
}
