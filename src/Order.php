<?php


namespace Cblink\MeituanDispatch;


class Order extends Api
{
    public function createByShop(array $params)
    {
        return $this->request('order/createByShop', $params);
    }


    public function createByCoordinates(array $params)
    {
        return $this->request("order/createByCoordinates", $params);
    }

    public function delete(array $params)
    {
        return $this->request("order/delete", $params);

    }

    public function queryStatus(array $params)
    {
        return $this->request('order/status/query',$params);
    }

    public function evaluate(array $params)
    {
        return $this->request('order/evaluate',$params);
    }

    public function check(array $params)
    {
        return $this->request('order/check',$params);
    }

    public function location(array $params)
    {
        return $this->request('order/rider/location',$params);
    }
    public function addTip(array $params)
    {
        return $this->request('order/addTip',$params);
    }
    public function queryArea(array $params)
    {
        return $this->request('shop/area/query',$params);
    }



}