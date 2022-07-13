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

    	$bookList = $this->BookInfoService()->getBookList($page,$limit,$bookId);

    	$this->success($bookList);
    }

    /**
     * 获取书籍信息
     */
    public function getBookInfo()
    {

    	$id = $this->request->input('book_id');

    	$bookInfo = $this->BookInfoService()->getBookInfoById($id);
    	$this->success($bookInfo);
    }

    /**
     * 获取书籍信息
     */
    public function getBookInfoByIsbn()
    {
    	$isbn = $this->request->input('isbn');
    	$bookInfo = $this->BookInfoService()->searchBookByIsbn($isbn);
    	$this->success($bookInfo);
    }

    

}


?>