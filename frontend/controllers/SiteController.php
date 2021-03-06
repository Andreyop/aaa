<?php
namespace frontend\controllers;

use common\models\Brands;
use common\models\CartItem;
use common\models\Product;
use common\models\ProductSearch;
use common\models\UserAddress;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends \frontend\base\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        $brands = Brands::find()->where(['status' => 1])->limit(12)->all();
        $product_sale = Product::find()->where(['sale' => 1])->limit(3)->all();
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->published(),
            'pagination' => [
                'pageSize' => 21,
            ],

        ]);
        return $this->render('index', [
            'product_sale' => $product_sale,
            'brands' => $brands,
            'dataProvider' => $dataProvider,

        ]);
    }

    public function actionCreate()
    {
        $model = new ProductSearch(); // give your actual model name instead of Model
        if($model->load(Yii::$app->request->post()))
        {
            list($model->min_money, $model->max_money) = explode(',', $model->min_money);
            // now both $model->min_money and $model->max_money are set and contains value submitted in form by Kartik Slider Widget
            if($model->save(true))
            {
                // success -> redirect
            }
            else
            {
                // error render to form again
            }

        }
    }
    public function actionAbout()
    {

        return $this->render('about', [

        ]);
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
    /**
     * ???????????????????? ???????????? ???? ???????????????? ??????????????
     */
    public function actionSearch($query = '') {

        /*
         * ?????????? ???????????????? ??????, ?????????????????? ???????????????? ???? site/search/query/??????????????
         * ?????????? ???????????????? ???????????????????? ?????????????? ???? ?????????? ?????????????? POST. ???????? ????????????
         * ???????????????????? ?????????????? ????????????, ?????????????????? ???????????????? ???? site/search.
         */
        if (Yii::$app->request->isPost) {
            $query = Yii::$app->request->post('query');
            if (is_null($query)) {
                return $this->redirect(['site/search']);
            }
            $query = trim($query);
            if (empty($query)) {
                return $this->redirect(['site/search']);
            }

            $query = urlencode(Yii::$app->request->post('query'));
            return $this->redirect(['site/search/query/'.$query]);
        }
        $searchModel = new \backend\models\search\ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get($query));

        // ?????????????????????????? ????????-???????? ?????? ????????????????
//        $this->setMetaTags('?????????? ???? ????????????????');

        return $this->render(
            'search',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }



}
