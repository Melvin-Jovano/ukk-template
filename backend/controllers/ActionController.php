<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginPetugas;
use backend\models\Spp;
use backend\models\Shortcut;
use common\models\Petugas;
use common\models\LoginForm;
use common\models\User;
use frontend\models\Student;
use yii\web\Response;

/**
 * Site controller
 */
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
                'only' => ['get-siswa', 'get-diagram'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['get-siswa', 'get-diagram'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get-siswa' => ['post'],
                    // 'get-diagram' => ['post'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionGetSiswa()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;

        if ($req->isAjax) {
            $data = Student::find()->select('nisn, nama')->where(['id_kelas' => $req->post("class"), 'id_jurusan' => $req->post("skill")])->all();
            if($data) {
                return $response = [
                    'siswa' => $data
                ];
            } else {
                return $response = [
                    'siswa' => false
                ];

            }
        }
    }

    public function actionGetDiagram()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;

        if ($req->isAjax) {
            $dates = [];
            $data = [];
            
            for($i=1;$i<date("d")+1;$i++) {
                array_push($dates, $i);
            }

            foreach ($dates as $key) {
                $num = $key + 1;
                $tomm = date("Y-m-" . $num, strtotime('tomorrow'));
                $today = date("Y-m-" . $key);
                $total = Yii::$app->db->createCommand("SELECT sum(nominal) as total FROM spp WHERE created_at between '$today' AND '$tomm'")->queryScalar();

                array_push($data, $total != "" ? $total : 0);
            }

            return $response = [
                'total' => $data,
                'dates' => $dates,
                'maximum' => max($data),
                'month' => date("M"),
            ];
        }
    }

    public function actionGetShortcut()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;

        if ($req->isAjax) {
            $data = Shortcut::find()->select('url')->where(['name' => $req->post("name"), 'level' => $req->post("level")])->one();
            if($data) {
                return $this->redirect(url::toRoute([$data['url']]));
            } else {
                return $response = [
                    'data' => false
                ];

            }
            
        }
    }

    public function actionGetAllHistory()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;

        if ($req->isAjax) {
            $data = (new \yii\db\Query())
            ->select("spp.created_at, spp.nominal, siswa.nama, jurusan.jurusan, kelas.kelas")
            ->from('spp')
            ->leftJoin('siswa', 'siswa.nisn = spp.nisn')
            ->leftJoin('jurusan', 'jurusan.id = siswa.id_jurusan')
            ->leftJoin('kelas', 'kelas.id = siswa.id_kelas')
            ->all();

            if($data) {
                return $response = [
                    'data' => $data,
                ];
            } else {
                return $response = [
                    'data' => false
                ];
            }
        }
    }
}
