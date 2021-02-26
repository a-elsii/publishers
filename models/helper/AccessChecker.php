<?php

namespace app\models\helper;

use Yii;
use yii\base\Component;
use yii\rbac\CheckAccessInterface;
use app\models\User;
use app\models\My\MyHelper;

class AccessChecker extends Component implements CheckAccessInterface
{
    /**
     * Функция для проверки прав пользователя
     *
     * @param int|string $userId
     * @param string $permissionName
     * @param array $param
     * @return \yii\web\Response|bool
     * @throws \yii\web\HttpException
     */
    public function checkAccess($userId, $permissionName, $param = [])
    {
        $accessArr = include ('accessArr.php');
        $user = User::findOne($userId);
        if(!$user)
            return Yii::$app->controller->redirect('/site/login');

        // Получаем роль пользователя
        $role = $user->role;
        if($role == $permissionName)
            return true;

        // Если пользователь админ то показиваем ему все
        if($role == 'admin')
            return true;

        // Если пользователь юзер то мы скываем все
        if($role == 'user')
            return false;

        // Если у нас нету роли в массиве, то мы все скрываем
        if(!isset($accessArr[$role]))
            return false;

        // получаем permission и controller доступа
        $access = $accessArr[$role];

        // проверяем если $permissionName есть в массиве permission то мы даем доступ
        if(in_array($permissionName, $access['permission']))
            return true;

        // разделяем $permissionName если у нас через дефис
        $permissionArr = explode('-', $permissionName);

        // Если у нас меньше 2 елементов возвращаем false
        if(count($permissionArr) < 2)
            return false;

        // если у нас пустой массив с контролерами возвращаем false
        if(!isset($access['controller'][$permissionArr[0]]))
            return false;


        // проверяем если у нас по правам все разрешено в данном контролере то показиваем все
        if($access['controller'][$permissionArr[0]] === 'all')
            return true;

        // Если мы получаем не массив то мы закрываем доступы
        if(!is_array($access['controller'][$permissionArr[0]]))
            return false;

        // если у нас в controller есть права то мы отрываем доступы
        if(in_array($permissionArr[1], $access['controller'][$permissionArr[0]]))
            return true;

        return false;
    }
}