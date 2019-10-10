<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Weather;
use yii\helpers\Json;

class UpdateWeatherController extends Controller
{
    public $defaultAction = 'load';

    public function actionLoad()
    {
        $weatherMap = Weather::find()->select(['city','id'])->all();

        foreach ($weatherMap as $city) {
            $queryString = http_build_query([
                "q" => $city->city,
                "appid" => \Yii::$app->params['openweatherapi'],
                "units" => "metric"
            ]);
            try {
                $json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?{$queryString}");
            } catch (\Exception $e) {
                continue;
            }
            $response = Json::decode($json);
            $weather = Weather::findOne($city->id);
            $weather->temp = $response['main']['temp'];
            $weather->save(false);
        }

        return ExitCode::OK;
    }
}
