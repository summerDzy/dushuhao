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
     * 根据用户id查询用户信息
     */
    public function getUserInfoById($userId)
    {
        $where[] = ['id', '=', $userId];
        $result =  $this->getDb()->where($where)->first();

        return $result ? $result->toArray() : $result;
    }

    /**
     * 根据用户openid查询用户信息
     */
    public function getUserInfoByOpenid($openid)
    {
        $where[] = ['openid', '=', $openid];
        $result =  $this->getDb()->where($where)->first();

        return $result ? $result->toArray() : $result;
    }

    /**
     * 添加用户信息
     */
    public function addUserInfo(array $data)
    {
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        return $this->getDb()->insertGetId($data);  
    }
}
