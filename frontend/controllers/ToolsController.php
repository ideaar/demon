<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class ToolsController extends Controller
{

	public function __construct($id, $module, $config = []){
		parent::__construct($id, $module, $config);
		Yii::$app->response->format = Response::FORMAT_JSON;
	}

	//时间格式转换
	public function actionTranslateTime(){
		$result = ['error' => 0, 'msg' => '', 'data' => '' ];

		$subject = Yii::$app->request->post('otime');
		if( empty($subject) ){
			$result['error'] = 1;
			$result['msg'] = '请输入数据';

			return $result;
		}
		$rs = $this->isTimeValid($subject);
		if( !$rs ){
			$result['error'] = 1;
			$result['msg'] = '数据格式不正确';

			return $result;
		}

		if( $rs>9999 ){
			$result['data'] = date('Y-m-d H:i:s', $rs);
		}else{
			$result['data'] = strtotime($subject);
		}

		return $result;
	}

	/**
	 *判断一个变量是否为非零数字
	 *@param $subject string|integer
	 */
	protected function isTimeValid( $subject ){
		$intVal = intval($subject);
		if( empty($intVal) ){
			return false;
		}else{
			return $intVal;
		}
	}
}
