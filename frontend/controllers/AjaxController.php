<?php


namespace frontend\controllers;

use Yii;
use frontend\controllers\ex\RequestException;
use yii\web\Controller;

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
