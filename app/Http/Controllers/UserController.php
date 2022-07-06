<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 用户信息
 */
class UserController extends BaseController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * 获取授权书籍列表
     */
    public function getUserInfo()
    {
    	$id = $this->request->input('id');

    	return $userInfo = $this->UserInfoService()->getUserInfoById($id);
    }

    

}


?>