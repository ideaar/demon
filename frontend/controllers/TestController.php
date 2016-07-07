<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller{
	
	public function actionIndex(){
		$cache = Yii::$app->redis;
		var_dump($cache);exit;
		$cache->set('k', 'k1');
		echo $cache->get('k');
	}

}
