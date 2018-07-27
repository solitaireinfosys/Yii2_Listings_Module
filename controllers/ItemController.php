<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\SearchItems;
/*
Class ItemController use to perform get All items
*/

class ItemController extends Controller
{
    /*
    * Description :- index method used to get All items and also with search filter 
    * parameters :- search, page, limit ,offset
    */
    public function actionIndex()
    {
   		$queryParams = Yii::$app->request->queryParams; 
        $keyword = (isset($queryParams['SearchItems']['search'])) ? $queryParams['SearchItems']['search'] : '';
        $page = (isset($queryParams['page'])) ? $queryParams['page'] : 0;
        $limit = 10;
   		$offset = ($page * $limit) - $limit;               
        
   		$model = new SearchItems();
	  	$url = 'http://api3.beachinsoft.com/?r=api/search&engine=1&keywords='.$keyword.'&api_key=testdev&offset='.$offset.'&limit='.$limit; 
		$headr = array();
		$headr[] = 'Accept: application/json';

		$crl = curl_init();
		curl_setopt($crl, CURLOPT_URL, $url);
		curl_setopt($crl, CURLOPT_HTTPHEADER,$headr);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($crl, CURLOPT_HTTPGET,true);
		$response = curl_exec($crl);
		$items = json_decode($response, true);	
		if(count($items['result']['results']) > 0) {
			foreach($items['result']['results'] as $key => $result) {
				$items['result']['results'][$key]['created_time'] = date('M d Y', $result['created_at']);
			}
		}
       	if (Yii::$app->request->isAjax) {            
            echo  json_encode(array('total' => '10', 'result' => $items['result']['results']));
            die;       		
       	} else {
       		return $this->render('index',[
                'model' => $model]);	
       	}   
    }
   
}
