<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Soapmodel;

class SiteController extends Controller
{
    const WSDL_USER = '<<username>>'; //silahkan ganti dengan username/akun login halaman forlap
    const WSDL_PASS = '<<password>>';

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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        $wsdl = new Soapmodel();
        $token = $wsdl->token(self::WSDL_USER,self::WSDL_PASS);
        return $this->render('listtable',[
                            'temp' => $wsdl->listtable($token),
                        ]);
    }

    public function actionStruktur($table)
    {
        $tables = $table==''?'mahasiswa':$table;
        $wsdl = new Soapmodel();
        $token = $wsdl->token(self::WSDL_USER,self::WSDL_PASS);
        return $this->render('struktur',[
                            'temp' => $wsdl->dictionary($token,$tables),
                            'table' => $tables
                        ]);
    }

    public function actionView($table)
    {
        $tables = $table==''?'mahasiswa':$table;
        $filter = '';
        $order = '';
        $limit = 10;
        $offset = 0;
        $wsdl = new Soapmodel();
        $token = $wsdl->token(self::WSDL_USER,self::WSDL_PASS);
        return $this->render('view',[
                            'dictionary' => $wsdl->dictionary($token,$tables),
                            'total' => $wsdl->count_all($token,$tables,$filter),
                            'temp' => $wsdl->recordset($token,$tables,$filter,$order,$limit,$offset),
                            'table' => $tables
                        ]);
    }
}
