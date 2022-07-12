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


    public function searchBookByIsbn($isbn)
    {
    	$book = $this->bookInfoModel()->getBookListByIsbn($isbn);
    	if(empty($book)){
    		$url  =  'https://route.showapi.com/1626-1';
	        $data = [
	              'showapi_appid'=>'99343', //这里需要改成自己的appid
	              'showapi_sign'=>'6f31a4ba8ec446838b7009ff502f456f',  //这里需要改成自己的应用的密钥secret
	              'isbn'=>$isbn
	            ];

	        $result = $this->curl_post($url,$data);
	        $resultInfo = json_decode($result,true);
	        if($resultInfo['showapi_res_code']==0 && $resultInfo['showapi_res_body']['remark']=='success'){
	        	$bookData = $resultInfo['showapi_res_body']['data'];

	        	$book['book_name'] = $bookData['title'];
	        	$book['book_author'] = $bookData['author'];
	        	$book['book_cover'] = $bookData['img'];
	        	$book['book_isbn'] = $bookData['isbn'];
	        	$book['book_price'] = $bookData['price'];
	        	$book['publish_time'] = $bookData['pubdate'];
	        	$book['book_publish'] = $bookData['publisher'];
	        	$book['book_intro'] = $bookData['gist'];
	        	$book['book_pages'] = $bookData['page'];

	        	$book['id'] = $this->bookInfoModel()->addBookInfo($book);
	        }
    	}
	    	
        return $book;
    }

    public function curl_post($url,$post_data,$header=[])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}

?>