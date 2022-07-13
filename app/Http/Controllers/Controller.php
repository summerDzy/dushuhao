<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     /**
     * 统一标准成功输出
     */
    public function success($data = null, $code = 0, $message = '成功', $format = 'json')
    {
        $response['code'] = $code;
        $response['message'] = $message;
        if ($_SERVER['REQUEST_TIME_FLOAT']) {
            $response['req_time'] = round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 6);
            //$this->saveApiLog($response['req_time']);
        }
        $response['data'] = $data;
        $method = 'output' . ucfirst(strtolower($format));
        return $this->$method($response);
    }


    /**
     * 输出json格式数据
     */
    private function outputJson($response)
    {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * 输出text格式数据
     */
    private function outputText($response)
    {
        return $response;
    }
}
