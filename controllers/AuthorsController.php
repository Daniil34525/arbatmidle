<?php

namespace app\controllers;

use app\models\Authors;
use app\models\AuthorsSearch;

class AuthorsController extends BaseController
{
    public $indexView = 'index';
    public $modelClass = Authors::class;
    public $searchModelClass = AuthorsSearch::class;
    public $updateView = 'create_update_view';
}
