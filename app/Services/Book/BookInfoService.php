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


    public function searchBookByIsbn($page,$limit,$isbn)
    {
    	$book = $this->bookInfoModel()->getBookListByIsbn($page,$limit,$isbn);
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

	        	$book_data['book_name'] = $bookData['title'];
	        	$book_data['book_author'] = $bookData['author'];
	        	$book_data['book_cover'] = $bookData['img'];
	        	$book_data['book_isbn'] = $bookData['isbn'];
	        	$book_data['book_price'] = $bookData['price'];
	        	$book_data['publish_time'] = $bookData['pubdate'];
	        	$book_data['book_publish'] = $bookData['publisher'];
	        	$book_data['book_intro'] = $bookData['gist'];
	        	$book_data['book_pages'] = $bookData['page'];

	        	$bookId = $this->bookInfoModel()->addBookInfo($book_data);

	        	$book = $this->bookInfoModel()->getBookList($page,$limit,$bookId);

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