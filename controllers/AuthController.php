<?php
namespace app\controllers;
use app\models\form\LoginForm;
use app\models\form\SignUpForm;
use Yii;
use yii\web\Controller;
use app\models\User;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('/auth/login', [
            'model' => $model,
        ]);
    }

    public function actionSignup(){

        $model = new SignUpForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::createUser($model->username, $model->email, $model->password);
            if ($user->save() && $user->setUserRole()) {
                Yii::$app->session->setFlash('FromSignUp');
                return $this->redirect(['/auth/login']);
            } else {
                throw new \RuntimeException('Saving error.');
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }



}