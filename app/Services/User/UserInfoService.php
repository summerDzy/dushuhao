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


}

?>