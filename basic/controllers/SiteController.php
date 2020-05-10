<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Lang;
use app\models\Region;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionMap()
    {
		/* это в ответ, отдовать*/
		$gr = Region::find()->where(['name' => 'Московская область'])->one();
		var_dump($gr->langsreg[0]->langs->name); 
		foreach($gr->langsreg as $k=>$v){
			//var_dump()
			echo '<br/><a href="/lang/desc?name='.$v->langs->name.'">Страна - ' . $v->langs->name . '</a><br/>';
		}
		exit;
		/**/
        return $this->render('map');
    }
	// public function actionLang()
    // {
		// $array = Lang::getAll();
        // return $this->render('lang', ['varInView' => $array]);
    // }
    //public function actionGetlanguages($country, $country_code, $region)
   // {
    //    echo '?country='.$country.'&country_code='.$country_code.'&region='.$region; exit;
        //$data = '';
        //return $data;
   // }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
            //return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    // public function actionContact()
    // {
        // $model = new ContactForm();
        // if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            // Yii::$app->session->setFlash('contactFormSubmitted');

            // return $this->refresh();
        // }
        // return $this->render('contact', [
            // 'model' => $model,
        // ]);
    // }

    /**
     * Displays about page.
     *
     * @return string
     */
    // public function actionAbout()
    // {
        // return $this->render('about');
    // }
}
