<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
	 public function init(){
        parent::init();
        if(\Yii::$app->user->isGuest)
            return $this->redirect('/site/login');
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
