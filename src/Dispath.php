<?php


namespace Cblink\MeituanDispatch;


use Hanson\Foundation\Foundation;

class Dispath extends Foundation
{
    protected $order;
    public function __construct($config)
    {
        parent::__construct($config);
        $this->order= new Order($config['appKey'],$config['secret']);
    }

    public function __call($name,$arguments)
    {

        $this->order->{$name}(...$arguments);
    }
}