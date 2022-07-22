<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class BooksSearch extends Books
{
    public $AuthorName;

    public function rules(): array
    {
        return [
            [['id', 'name', 'AuthorName'], 'safe']
        ];
    }

    public function attributeLabels(): array
    {
        return array_merge(parent::attributeLabels(), ['AuthorName' => 'Автор']);
    }

    public function search($params): ActiveDataProvider
    {
        $query = self::find()->joinWith('author');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 1000,
            ],
        ]);
        $sort = array_merge($dataProvider->getSort()->attributes, [
            'AuthorName' => [
                'asc' => ['authors.name' => SORT_ASC],
                'desc' => ['authors.name' => SORT_DESC]
            ]
        ]);
        $dataProvider->getSort()->attributes = $sort;
        $this->load($params);

        if(!$this->validate())
        {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'books.id', $this->id]);
        $query->andFilterWhere(['like', 'books.name', $this->name]);
        $query->andFilterWhere(['like', 'authors.name', $this->AuthorName]);
        return $dataProvider;
    }
}