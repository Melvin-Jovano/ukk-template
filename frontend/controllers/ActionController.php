<?php
namespace frontend\controllers;

use backend\models\Spp;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;

class ActionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['get-all-data'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['get-all-data'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get-all-data' => ['post'],
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
    public function actionGetAllData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Spp::find()->where(['nisn' => Yii::$app->user->identity->nisn])->all();

        return $response = [
            'data' => $data
        ];
    }

    public function actionGetSpecificData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Spp::find()->where(["between", "created_at", Yii::$app->request->post("date1"), Yii::$app->request->post("date2")])->all();

        return $response = [
            'data' => $data
        ];
    }
}
