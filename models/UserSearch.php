<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * UserSearch extend user model.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'personal_code', 'phone'], 'integer'],
            [['first_name', 'last_name', 'email', 'lang'], 'safe'],
            [['active', 'dead'], 'boolean'],
        ];
    }

    /**
     * dataProvider search query
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // filter by user
        $query->andFilterWhere([
            'id' => $this->id,
            'personal_code' => $this->personal_code,
            'phone' => $this->phone,
            'active' => $this->active,
            'dead' => $this->dead,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'lang', $this->lang]);

        return $dataProvider;
    }
}
