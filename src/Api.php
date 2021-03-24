<?php


namespace Cblink\MeituanDispatch;


use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
    private $appKey;
    private $secret;
    const url="https://peisongopen.meituan.com/api/";
    public function  __construct(string $appKey,string $secret)
    {
        $this->appKey=$appKey;
        $this->secret=$secret;
    }

    public function signature(array $params)
    {
        ksort($params);
        $waitSign='';
        foreach ($params as $k=>$param) {
            if ($param) {
                $waitSign.=$k.$param;
            }
        }
        return  strtolower(sha1($this->secret.$waitSign));
    }


    public function request(string $method,array $params)
    {
        $params=array_merge($params,[
            "appkey"=>$this->appKey,
            "timestamp"=>time(),
            "version"=>'1.0',
        ]);
        $params['sign']=$this->signature($params);
        $http = $this->getHttp();
        $response = $http->post( self::url . $method, $params);
        $result=  json_decode(strval($response->getBody()),true);
        $this->checkErrorAndThrow($result);
        return $result;
    }


    private function checkErrorAndThrow($result)
    {
        if (!$result || $result['code'] != 0) {
            throw new  MeituanDispatchException($result['message'],$result['code']);
        }
    }
}