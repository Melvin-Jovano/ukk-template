<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Student;
use frontend\models\Classes;
use frontend\models\Skill;
use frontend\models\Info;
use frontend\models\Password;
use common\models\User;

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
                'only' => ['logout', 'signup', 'dashboard', 'profile'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'dashboard', 'profile'],
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
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('site/login');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        $req = Yii::$app->request;
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('dashboard');
        }

        if (Yii::$app->request->post()) {
            $check = Student::find()->where(['nisn' => $req->post('LoginForm')['nisn']])->one();
            if ($check) {
                if (strlen($check['password']) != 0) {
                    if (strlen($req->post('LoginForm')['password']) != 0) {
                        if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post('LoginForm')['password'], $check['password'])) {
                            $model->login(User::findByNISN($req->post('LoginForm')['nisn']));
                            return $this->redirect('dashboard');
                        } else {
                            Yii::$app->session->setFlash('danger', 'Password Salah');
                            $model->nisn = $req->post('LoginForm')['nisn'];
                            $model->password = "";
                            return $this->render('login', [
                                'model' => $model,
                                'password' => true,
                            ]);
                        }
                    } else {
                        Yii::$app->session->setFlash('info', 'Silahkan Masukkan Password Untuk Masuk');
                        $model->nisn = $req->post('LoginForm')['nisn'];
                        $model->password = "";
                        return $this->render('login', [
                            'model' => $model,
                            'password' => true,
                        ]);
                    }
                    

                } else {
                    $model->login(User::findByNISN($req->post('LoginForm')['nisn']));
                    return $this->redirect('dashboard');
                }
            } else {
                Yii::$app->session->setFlash('success', 'NISN TIdak Terdaftar');
                $model->nisn = $req->post('LoginForm')['nisn'];
                $model->password = "";
                return $this->render('login', [
                    'model' => $model,
                    'password' => false,
                ]);
            }
        }

        return $this->render('login', [
            'model' => $model,
            'password' => false,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            
            $student = new Student;
            $student->nisn = Yii::$app->request->post('SignupForm')['nisn'];
            $student->nama = Yii::$app->request->post('SignupForm')['nama'];
            $student->password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('SignupForm')['password']);
            $student->created_at = date('Y-m-d H:i:s');
            $student->save();

            Yii::$app->session->setFlash('success', 'Akun Telah Dibuat, Silahkan Login');
            return $this->goHome();
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionProfile()
    {
        $password = new Password;
        $data = Info::find()->where(["nisn" => Yii::$app->user->identity->nisn])->one();
        $myClass = Classes::find()->where(['id' => $data['id_kelas']])->one();
        $mySkill = Skill::find()->where(['id' => $data['id_skill']])->one();
        $class = Classes::find()->all();
        $skill = Skill::find()->all();

        if (Yii::$app->request->post()) {
            if (Yii::$app->request->post('Password')['password_2']) {
                $data = Student::find()->where(["nisn" => Yii::$app->user->identity->nisn])->one();
                if ($data['password'] != "") {
                    if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post('Password')['password'], $data['password'])) {
                        Yii::$app->session->setFlash('success', 'Kata Sandi Telah Diperbarui');
                        $data->password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('Password')['password_2']);
                        $data->save();
                        return $this->redirect(['site/profile']);
                    } else {
                        Yii::$app->session->setFlash('danger', 'Kata Sandi Lama Salah');
                        return $this->redirect(['site/profile']);
                    }
                } else {
                    Yii::$app->session->setFlash('success', 'Kata Sandi Telah Dibuat');
                    $data->password = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('Password')['password_2']);
                    $data->save();
                    return $this->redirect(['site/profile']);

                }
            } else {
                $data = Student::find()->where(["nisn" => Yii::$app->user->identity->nisn])->one();
                $data->nama = Yii::$app->request->post('Info')['nama'];
                $data->nis = Yii::$app->request->post('Info')['nis'];
                $data->id_kelas = Yii::$app->request->post('Classes')['id'];
                $data->id_skill = Yii::$app->request->post('Skill')['id'];
                $data->alamat = Yii::$app->request->post('Info')['alamat'];
                $data->no_telp = Yii::$app->request->post('Info')['no_telp'];
                $data->save();
                Yii::$app->session->setFlash('success', 'Profil Telah Diperbarui');
            }
            
        }
        $old = $data['password'] != "" ? false : true;

        return $this->render('profile', [
            'data' => $data,
            'class' => $class,
            'skill' => $skill,
            'mySkill' => $mySkill,
            'myClass' => $myClass,
            'pass' => $password,
            'old' => $old,
        ]);
    }
}
