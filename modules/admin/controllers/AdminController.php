<?php

namespace app\modules\admin\controllers;
use yii\web\Controller;
class AdminController extends Controller {
    public function beforeAction($action) {
        if ( ! isset($_SESSION['auth_site_admin'])) {
            $this->redirect('/admin/auth/login');
            return false;
        }
        return parent::beforeAction($action);
    }
}
