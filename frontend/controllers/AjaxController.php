<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\ex\RequestException;
use GuzzleHttp\Client;

class AjaxController extends Controller
{
    public function actionCoords($value)
    {

        $this->layout = false;
        $params = array(
            'geocode' => $value,
            'format' => 'json',
            'apikey' => Yii::$app->params['geo-coder-apiKey'],
        );
        try {
//            $client = new Client([
//                'base_uri' => 'http://geocode-maps.yandex.ru/1.x/',
//            ]);
//            $response = $client->request('GET', '', [
//                'query' => ['geocode' => $value, 'apikey' => Yii::$app->params['geo-coder-apiKey']]
//            ]);
//            $content = $response->getBody()->getContents();
//            $response_data = json_decode($content, true);
//
//            if ($response_data->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0) {
//                $items = $response_data->GeoObjectCollection->featureMember;
//            }
            ini_set('default_socket_timeout', 900); // 900 Seconds = 15 Minutes

            $response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));
            $coords = [];
            if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0) {
                $items = $response->response->GeoObjectCollection->featureMember;
                foreach ($items as $item) {
                    $pieces = explode(" ", $item->GeoObject->Point->pos);
                    $coords[] = [
                        'name' => $item->GeoObject->name,
                        'latitude' => $pieces[1],
                        'longitude' => $pieces[0],
                    ];
                }
                return json_encode(['coords' => $coords, 'success' => true]);
            } else {
                return json_encode(['message' => 'Ничего не найдено', 'success' => false]);
            }
        } catch (RequestException $e) {
            return json_encode(['message' => $e->getMessage(), 'success' => false]);
        }

    }
}
