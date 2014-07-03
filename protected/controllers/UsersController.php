<?php

class UsersController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('profile', 'settings'),
                'users' => array('@'),
            ),

            array('allow',
                'actions' => array('usersOnline'),
                'users' => array('*')
            ),

            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionProfile($id)
    {
        $user = Users::model()->findByPk($id);
        if (is_null($user))
            throw new CHttpException(404, Yii::t('translations', 'Профиль не найден'));
        $this->render('profile', array(
            'user' => $user,
        ));
    }

    public function actionSettings()
    {
        $model = Users::model()->findByPk(Yii::app()->user->id);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            if (isset($_POST['Users']['pwd']))
                $model->pwd = crypt($_POST['Users']['pwd']);
            $model->language = $_POST['Users']['language'];
            Yii::app()->session['lang'] = $model->language;
            if ($model->save())
                $this->redirect('/users/settings');
        }

        $this->render('settings', array('model' => $model));
    }

    public function actionUsersOnline()
    {
        $time = strtotime(Time::now())-10*60;
        $time = date('Y-m-d H:i:s', $time);
        $users = Users::model()->findAll("last_update > '$time'");
        $this->render('users_online',array(
            'users' => $users
        ));
    }
}