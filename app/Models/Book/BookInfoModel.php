<?php

namespace App\Models\Book;

use App\Models\BaseModel;

/**
 * 书籍标签表
 */
class BookInfoModel extends BaseModel
{
    protected $table = 'db_book_info';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 查询图书列表
     */
    public function getBookList($page,$limit,$bookId)
    {
    	$where = [];
        if ($bookId) $where[] = ['id', $bookId];
        $skip = ($page - 1) * $limit;
        $data['count'] = $this->getDb()->where($where)->count();
        $data['list'] = $this->getDb()->select('*')->where($where)->skip($skip)->take($limit)->orderByDesc('id')->get()->toArray();
        return $data;
    }

    /**
     * 根据书籍id查询书籍
     */
    public function getBookInfoById($bookId)
    {
        $where[] = ['id', '=', $bookId];
        $result =  $this->getDb()->where($where)->first();

        return $result ? $result->toArray() : $result;
    }


}
