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
     * 获取授权用户信息
     */
    public function getUserInfo()
    {
    	$id = $this->request->input('id');

    	$userInfo = $this->UserInfoService()->getUserInfoById($id);
        $this->success($userInfo);
    }

    /**
     * 获取授权用户信息
     */
    public function getUserInfoByOpenid()
    {
        $openid = $this->request->header('X-WX-OPENID');

        $userInfo = $this->UserInfoService()->getUserInfoByOpenid($openid);
        $this->success($userInfo);
    }

    /**
     *  添加用户信息
     *  avatarUrl: ""
     *  city: ""
     *  country: ""
     *  gender: 0
     *  language: "zh_CN"
     *  nickName: "宗源"
     *  province: ""
     */
    public function addUserInfo()
    {
        $data['openid'] = $this->request->header('X-WX-OPENID');
        $data['name'] = $this->request->input('nickName');
        $data['avatar_url'] = $this->request->input('avatarUrl');

        $userInfo = $this->UserInfoService()->addUserInfo($data);
        $this->success($userInfo);
    }

}


?>