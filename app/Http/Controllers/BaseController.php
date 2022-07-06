<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\User\UserInfoService;
use App\Services\Book\BookInfoService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $request;

    // 用户信息
    public $userInfoService;
    public $bookInfoService;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function userInfoService()
    {
        if (!$this->userInfoService) $this->userInfoService = new UserInfoService();
        return $this->userInfoService;
    }

    public function bookInfoService()
    {
        if (!$this->bookInfoService) $this->bookInfoService = new BookInfoService();
        return $this->bookInfoService;
    }

}
