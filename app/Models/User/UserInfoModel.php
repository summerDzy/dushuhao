<?php

namespace App\Models\User;

use App\Models\BaseModel;

/**
 * 书籍标签表
 */
class UserInfoModel extends BaseModel
{
    protected $table = 'user_info';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 根据书籍id查询书籍标签
     */
    public function getUserInfoById($userId)
    {
        $where[] = ['id', '=', $userId];
        $result =  $this->getDb()->where($where)->first();

        return $result ? $result->toArray() : $result;
    }


}
