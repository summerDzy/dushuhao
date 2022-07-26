<?php

namespace App\Services\User;
use App\Services\BaseService;

class UserInfoService extends BaseService
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserInfoById($id)
    {
    	return $this->userInfoModel()->getUserInfoById($id);
    }

    public function getUserInfoByOpenid($openid)
    {
    	return $this->userInfoModel()->getUserInfoByOpenid($openid);
    }

    public function addUserInfo(array $data)
    {
    	if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        
    	return $this->userInfoModel()->addUserInfo($data);
    }

}

?>