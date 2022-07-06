<?php

namespace App\Services;
use App\Models\User\UserInfoModel;
use App\Models\Book\BookInfoModel;

class BaseService
{
	// 审核
    private $userInfoModel;
    private $bookInfoModel;

    public function __construct()
    {

    }

    /**
     * 检查是否需要创建新实例
     */
    public function newInstance($instance)
    {
        if (!$instance) {
            return true;
        }
        return false;
    }

    /**
     * 用户信息模型
     */
    public function userInfoModel()
    {
        if ($this->newInstance($this->userInfoModel)) $this->userInfoModel = new UserInfoModel();
        return $this->userInfoModel;
    }

    /**
     * 图书信息模型
     */
    public function bookInfoModel()
    {
        if ($this->newInstance($this->bookInfoModel)) $this->bookInfoModel = new BookInfoModel();
        return $this->bookInfoModel;
    }
}


?>