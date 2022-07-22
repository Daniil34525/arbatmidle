<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class AuthorsSearch extends Authors
{
    public function rules(): array
    {
        return [
            [['id', 'name'], 'safe']
        ];
    }
    public function search($params): ActiveDataProvider
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if(!$this->validate()) return $dataProvider;

        $query->andFilterWhere(['like', 'authors.id', $this->id]);
        $query->andFilterWhere(['like', 'authors.name', $this->name]);
        return $dataProvider;
    }
}