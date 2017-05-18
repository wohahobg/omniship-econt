<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 12.5.2017 г.
 * Time: 18:03 ч.
 */

namespace Omniship\Econt\Http;

class TrackingParcelRequest extends AbstractRequest
{
    /**
     * @return array
     */
    public function getData() {

        var_dump($this->getClient()->getCities(null, 'София'));
        exit;

        return $this->getParcelId();
    }

    public function sendData($data) {
        $tracking = $this->getClient()->trackParcel($data);
        return $this->createResponse($tracking ? $tracking : $this->getClient()->getError());
    }

    /**
     * @param $data
     * @return TrackingParcelResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new TrackingParcelResponse($this, $data);
    }

}