<?php

namespace App\Controllers;

use App\Models\Video_Model;

class Movie extends BaseController
{

	protected $base_backurl;
	public $path_setting = "";
	public $path_ads = "";
	public $mvbranch = 1;
	public $anbranch = 2;
	public $backURL = "http://localhost:1004/public/";
	public $document_root = '';
	public $path_thumbnail = "https://anime.vip-streaming.com/";
	public $path_slide = "";
	public $searchUrl = "";
	public $contractUrl = "";

	public function __construct()
	{
		$this->config = new \Config\App();
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->VideoModel = new Video_Model();

		// Branch
		$this->mvbranch = 1;
		$this->anbranch = 2;

		// Url
		$this->searchUrl = base_url('search');
		$this->contractUrl = base_url('contract');
		$this->document_root = $this->config->docURL;

		// Directory
		$this->path_ads = $this->backURL . 'public/banners/';
		$this->path_setting = $this->backURL . 'setting/';
		$this->path_slide = $this->backURL . 'img_slide/';
		

		helper(['url', 'pagination', 'dateformat', 'validatetext']);
	}

	public function index()
	{
		$order = 'all';
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$list_popular = $this->VideoModel->get_list_popular($this->mvbranch);

		if(isset($_GET['order']) && $_GET['order'] == 'top-view') {
			$order = 'top-view';
		}

		$chk_act = [
			'home' => 'active',
			'anime' => '',
			'contract' => ''
		];

		$header_data = [
			'backURL' =>$this->backURL,
			'document_root' => $this->document_root,
			'searchUrl' => $this->searchUrl,
			'contractUrl' => $this->contractUrl,
			'path_setting' => $this->path_setting,
			'list_category' => $list_category,
			'chk_act' => $chk_act,
			'list_popular' => $list_popular,
			'setting' => $setting
		];

		$list = $this->VideoModel->get_list_video($this->mvbranch, '', $page, $order);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);
		$adstop = $this->VideoModel->get_adstop($this->mvbranch);

		$body_data = [
			'order' => $order,
			'branch' => $this->mvbranch,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
			'adstop' => $adstop,
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/index.php', $body_data);
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function video($id, $Name)
	{
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$videodata = $this->VideoModel->get_id_video($id);
		$videinterest = $this->VideoModel->get_video_interest($this->mvbranch);
		$adstop = $this->VideoModel->get_adstop($this->mvbranch);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);
		$list_popular = $this->VideoModel->get_list_popular($this->mvbranch);

		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$date = get_date($videodata['movie_create']);

		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$chk_act = [
			'home' => 'active',
			'anime' => '',
			'contract' => ''
		];

		$header_data = [
			'backURL' =>$this->backURL,
			'document_root' => $this->document_root,
			'searchUrl' => $this->searchUrl,
			'contractUrl' => $this->contractUrl,
			'path_setting' => $this->path_setting,
			'setting' => $setting,
			'list_popular' => $list_popular,
			'list_category' => $list_category,
			'chk_act' => $chk_act,
		];

		$body_data = [
			'branch' => $this->mvbranch,
			'url_loadmore' => base_url('moviedata') ,
			'path_thumbnail' => $this->path_thumbnail,
			'videodata' => $videodata,
			'videinterest' => $videinterest,
			'adstop' => $adstop,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
			'DateEng' => $date['DateEng'],
			'feildplay' => 'movie_thmain',
			'index' => 'a',
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/video.php', $body_data);
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function series($id, $Name, $index = 0, $epname = '')
	{
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$series = $this->VideoModel->get_ep_series($id);
		$videinterest = $this->VideoModel->get_video_interest($this->mvbranch);
		$adstop = $this->VideoModel->get_adstop($this->mvbranch);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);
		$list_popular = $this->VideoModel->get_list_popular($this->mvbranch);

		if($epname==''){
			$lastep = count($series['epdata']);
			$index = $lastep-1;
		}

		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$date = get_date($series['movie_create']);

		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];
		
		$chk_act = [
			'home' => 'active',
			'anime' => '',
			'contract' => ''
		];
		$header_data = [
			'backURL' =>$this->backURL,
			'document_root' => $this->document_root,
			'searchUrl' => $this->searchUrl,
			'contractUrl' => $this->contractUrl,
			'path_setting' => $this->path_setting,
			'setting' => $setting,
			'list_category' => $list_category,
			'list_popular' => $list_popular,
			'chk_act' => $chk_act,
		];

		$body_data = [
			'branch' => $this->mvbranch,
			'url_loadmore' => base_url('moviedata') ,
			'path_thumbnail' => $this->path_thumbnail,
			'videodata' => $series,
			'adstop' => $adstop,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
			'DateEng' => $date['DateEng'],
			'feildplay' => 'movie_thmain',
			'index' => $index,
			'videinterest' => $videinterest
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/video.php', $body_data);
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function moviedata()
	{
		$list = $this->VideoModel->get_list_video($this->mvbranch, '', $_GET['page']);

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list
		];

		echo view('moviedata.php', $header_data);
	}

	public function moviedata_search()
	{
		$list = $this->VideoModel->get_list_video($this->mvbranch, $_GET['keyword'], $_GET['page']);

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,

		];
		echo view('moviedata.php', $header_data);
	}

	public function moviedata_category()
	{
		$list = $this->VideoModel->get_id_video_bycategory($this->mvbranch, $_GET['keyword'], $_GET['page']);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
		];

		$body_data = [
			'url_loadmore' => base_url('moviedata'),
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/category.php', $body_data);
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function categorylist() //ต้นแบบ หน้า cate / search
	{
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$chk_act = [
			'home' => '',
			'poppular' => '',
			'newmovie' => '',
			'netflix' => '',
			'category' => 'active',
			'contract' => ''
		];

		$header_data = [
			'document_root' => $this->document_root,
			'path_setting' => $this->path_setting,
			'setting' => $setting,
			'path_thumbnail' => $this->path_thumbnail,
			'chk_act' => $chk_act,
		];

		$list_category = $this->VideoModel->get_category($this->mvbranch);

		$body_data = [
			'list_category' => $list_category
		];


		echo view('templates/header.php', $header_data);
		echo view('movie/category.php', $body_data);
		echo view('templates/footer.php');
	}

	public function popular() //ต้นแบบ หน้า cate / search
	{
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$list = $this->VideoModel->get_list_popular($this->mvbranch);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);

		$chk_act = [
			'home' => '',
			'poppular' => 'active',
			'newmovie' => '',
			'netflix' => '',
			'category' => '',
			'contract' => ''
		];

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'path_slide' => $this->path_slide,
			'path_setting' => $this->path_setting,
			'setting' => $setting,
			'chk_act' => $chk_act,
			'list_category' => $list_category,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/popular.php');
		echo view('templates/footer.php');
	}

	public function search($keyword)
	{
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list = array() ;
		$keyword = urldecode(str_replace("'","\'",$keyword));
		$list = $this->VideoModel->get_list_video($this->mvbranch,  $keyword, $page);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);
		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$list_popular = $this->VideoModel->get_list_popular($this->mvbranch);

		$chk_act = [
			'home' => 'active',
			'anime' => '',
			'contract' => ''
		];

		$header_data = [
			'backURL' =>$this->backURL,
			'document_root' => $this->document_root,
			'searchUrl' => $this->searchUrl,
			'contractUrl' => $this->contractUrl,
			'path_setting' => $this->path_setting,
			'list_category' => $list_category,
			'chk_act' => $chk_act,
			'list_popular' => $list_popular,
			'keyword' => $keyword,
			'setting' => $setting
		];

		// print_r($list);
		// exit;

		$body_data = [
			'url_loadmore' => base_url('moviedata_search'),
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/search.php', $body_data);
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function category($cate_id, $cate_name)
	{
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list = $this->VideoModel->get_id_video_bycategory($this->mvbranch, $cate_id, $page);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);
		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$list_popular = $this->VideoModel->get_list_popular($this->mvbranch);
		
		$chk_act = [
			'home' => 'active',
			'anime' => '',
			'contract' => ''
		];

		$header_data = [
			'backURL' =>$this->backURL,
			'document_root' => $this->document_root,
			'searchUrl' => $this->searchUrl,
			'contractUrl' => $this->contractUrl,
			'path_setting' => $this->path_setting,
			'list_category' => $list_category,
			'chk_act' => $chk_act,
			'list_popular' => $list_popular,
			'setting' => $setting
		];

		$body_data = [
			'cate_name' => urldecode($cate_name),
			'keyword' => $cate_id,
			'url_loadmore' => base_url('moviedata_category'),
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/category.php', $body_data);
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function contract() //ต้นแบบ หน้า cate / search
	{
		$setting = $this->VideoModel->get_setting($this->mvbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list_category = $this->VideoModel->get_category($this->mvbranch);
		$adsbottom = $this->VideoModel->get_adsbottom($this->mvbranch);
		$list_popular = $this->VideoModel->get_list_popular($this->mvbranch);

		$chk_act = [
			'home' => '',
			'anime' => '',
			'contract' => 'active'
		];

		$header_data = [
			'backURL' =>$this->backURL,
			'document_root' => $this->document_root,
			'searchUrl' => $this->searchUrl,
			'contractUrl' => $this->contractUrl,
			'path_setting' => $this->path_setting,
			'setting' => $setting,
			'list_category' => $list_category,
			'list_popular' => $list_popular,
			'adsbottom' => $adsbottom,
			'chk_act' => $chk_act,
			'urlrequests' => base_url().'/save_requests/',
			'urlrequestanime' => base_url().'/anime/save_requests/',
			'urlconads' => base_url().'/con_ads/',
		];

		echo view('templates/header.php', $header_data);
		echo view('movie/contract.php');
		echo view('movie/footer.php');
		echo view('templates/footer.php');
	}

	public function player($id, $index)
	{
		$video_data = $this->VideoModel->get_id_video($id);
		$series = $this->VideoModel->get_ep_series($id);
		$adsvideo = $this->VideoModel->get_adsvideolist($this->backURL);
		// echo '<pre>' . print_r($anime, true) . '</pre>';
		// 		die;
		$playerUrl =$video_data['movie_thmain'];

		if ($index != "a") {
			$playerUrl =$series['epdata'][$index] ;
		}

		$data = [
			'document_root' => $this->document_root,
			'branch' 		=> $this->mvbranch,
			'backUrl' 		=> $this->backURL,
			'adsvideo'		=> $adsvideo,
			'playerUrl' 	=> $playerUrl
		];

		echo view('movie/player.php', $data);
	}

	public function countView($id)
	{
		$this->VideoModel->countView($id);
	}

	public function save_requests()
	{
		$request_text = $_POST['request_movie_text'];

		$this->VideoModel->save_requests($this->mvbranch, $request_text);
	}

	public function con_ads()
	{
		$ads_con_name =$_POST['ads_con_name'];
		$ads_con_email = $_POST['ads_con_email'];
		$ads_con_line = $_POST['ads_con_line'];
		$ads_con_tel = $_POST['ads_con_tel'];

		$this->VideoModel->con_ads($this->mvbranch, $ads_con_name, $ads_con_email, $ads_con_line, $ads_con_tel);
	}

	public function saveReport()
	{


		$movie_id =  $_POST['movie_id'];
		$movie_name = $_POST['movie_name'];
		$movie_ep_name = $_POST['movie_ep_name'];
		$datetime = date('Y-m-d H:i:s');



		$result = $this->VideoModel->save_reports($this->mvbranch,$movie_id,$movie_name,$movie_ep_name,$datetime);


	}
}
