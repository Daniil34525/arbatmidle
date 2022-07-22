<?php

namespace app\controllers;

use app\models\Books;
use app\models\BooksSearch;

class BooksController extends BaseController
{
    public $indexView = 'index';
    public $modelClass = Books::class;
    public $searchModelClass = BooksSearch::class;
    public $updateView = 'create_update_view';
}
