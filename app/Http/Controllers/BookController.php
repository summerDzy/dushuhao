<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 图书信息
 */
class BookController extends BaseController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * 获取书籍列表
     */
    public function getBookList()
    {
    	$page = $this->request->input('page', 1);
        $limit = $this->request->input('limit', 10);
        $bookId = $this->request->input('book_id');

    	return $userInfo = $this->BookInfoService()->getBookList($page,$limit,$bookId);
    }

    /**
     * 获取书籍信息
     */
    public function getBookInfo()
    {

    	$id = $this->request->input('book_id');

    	return $userInfo = $this->BookInfoService()->searchBookByIsbn($id);

    	//return $userInfo = $this->BookInfoService()->getBookInfoById($id);
    }

    /**
     * 获取书籍信息
     */
    public function getBookInfoByIsbn()
    {

    	$isbn = $this->request->input('isbn');

    	return $userInfo = $this->BookInfoService()->searchBookByIsbn($isbn);
    }

    

}


?>