<?php

namespace App\Services\Book;
use App\Services\BaseService;

class BookInfoService extends BaseService
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getBookList($page,$limit,$bookId)
    {
    	return $this->bookInfoModel()->getBookList($page,$limit,$bookId);
    }

    public function getBookInfoById($id)
    {
    	return $this->bookInfoModel()->getBookInfoById($id);
    }


}

?>