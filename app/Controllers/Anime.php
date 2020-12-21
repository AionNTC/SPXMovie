<?php namespace App\Controllers;
use App\Models\Anime_Model;

class Anime extends BaseController
{

	protected $base_backurl;
	public $path_setting = "";
	public $path_ads = "";
	public $anbranch = 1;
	public $backURL = "http://localhost:9999/public/";
	public $document_root = '';
	public $path_thumbnail = "https://anime.vip-streaming.com/";
	public $path_slide = "";
	public $searchUrl = "";
	public $contactUrl = "";

	public function __construct()
	{
		$this->config = new \Config\App();
		$this->validation =  \Config\Services::validation();
		$this->session = \Config\Services::session();
		$this->AnimeModel = new Anime_Model();
		$this->document_root = $this->config->docURL;
		$this->anbranch = 2;

		// Directory
		$this->path_ads = $this->backURL . 'banners/';
		$this->path_setting = $this->backURL . 'setting/';
		$this->path_slide = $this->backURL . 'img_slide/';
		$this->searchUrl = base_url('search');
		$this->contractUrl = base_url('contract');

		helper(['url', 'pagination', 'dateformat', 'validatetext']);
	}

	public function index()
	{
		$order = 'all';
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$setting = $this->AnimeModel->get_setting($this->anbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list_category = $this->AnimeModel->get_category($this->anbranch);
		$list_popular = $this->AnimeModel->get_list_popular($this->anbranch);
		
		if(isset($_GET['order']) && $_GET['order'] == 'top-view') {
			$order = 'top-view';
		}

		$chk_act = [
			'home' => '',
			'anime' => 'active',
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

		$adstop = $this->AnimeModel->get_adstop($this->anbranch);
		$list = $this->AnimeModel->get_list_video($this->anbranch, '', $page, $order);
		$adsbottom = $this->AnimeModel->get_adsbottom($this->anbranch);

		$body_data = [
			'order' => $order,
			'branch' => $this->anbranch,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
			'adstop' => $adstop,
		];

		echo view('templates/header.php', $header_data);
		echo view('anime/index.php', $body_data);
		echo view('anime/footer.php');
		echo view('templates/footer.php');
	}

	public function anime($id, $Name, $index = 0, $epname = '')
	{
		$setting = $this->AnimeModel->get_setting($this->anbranch);
		$seo = $this->AnimeModel->get_seo($this->anbranch);
		$series = $this->AnimeModel->get_ep_series($id);
		$videinterest = $this->AnimeModel->get_video_interest($this->anbranch);
		$adstop = $this->AnimeModel->get_adstop($this->anbranch);
		$adsmiddle = $this->AnimeModel->get_adsmiddle($this->anbranch);
		$adsbottom = $this->AnimeModel->get_adsbottom($this->anbranch);
		$list_popular = $this->AnimeModel->get_list_popular($this->anbranch);

		if($epname==''){
			$lastep = count($series['epdata']);
			$index = $lastep-1;
		}

		$list_category = $this->AnimeModel->get_category($this->anbranch);
		$date = get_date($series['movie_create']);

		if (substr($series['movie_picture'], 0, 4) == 'http') {
			$movie_picture = $series['movie_picture'];
		} else {
			$movie_picture = $this->path_thumbnail . $series['movie_picture'];
		}
		$setting['setting_img'] = $movie_picture;
		
		if(!empty($seo)){
			if(!empty($seo['seo_title'])){
				$title = $seo['seo_title'];
				$name_videos = $series['movie_thname'];
				$title_name = $setting['setting_title'];
				$title_web = str_replace(
								"{movie_title} - {title_web}", 
								$name_videos . " - " . $title_name, 
								$title
							);
				$setting['setting_title'] = $title_web;
			}
			
			if(!empty($seo['seo_description'])){
				$description = $seo['seo_description'];
				$description_movie = $series['movie_des'];
				$setting['setting_description'] = str_replace("{movie_description}", $description_movie, $description);
			}
			
		}


		$chk_act = [
			'home' => '',
			'anime' => 'active',
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
			'branch' => $this->anbranch,
			'url_loadmore' => base_url('moviedata') ,
			'path_thumbnail' => $this->path_thumbnail,
			'videodata' => $series,
			'adstop' => $adstop,
			'adsmiddle' => $adsmiddle,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
			'DateEng' => $date['DateEng'],
			'feildplay' => 'movie_thmain',
			'index' => $index,
			'videinterest' => $videinterest
		];
		
		echo view('templates/header.php', $header_data);
		echo view('anime/video.php', $body_data);
		echo view('anime/footer.php');
		echo view('templates/footer.php');
	}

	public function moviedata()
	{
		$list = $this->AnimeModel->get_list_video($this->anbranch, '', $_GET['page']);

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list
		];

		echo view('moviedata.php', $header_data);
	}

	public function moviedata_search()
	{
		$list = $this->AnimeModel->get_list_video($this->anbranch, $_GET['keyword'], $_GET['page']);

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,

		];
		echo view('moviedata.php', $header_data);
	}

	public function moviedata_category()
	{
		$list = $this->AnimeModel->get_id_video_bycategory($this->anbranch, $_GET['keyword'], $_GET['page']);

		$header_data = [
			'document_root' => $this->document_root,
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
		];

		echo view('moviedata.php', $header_data);
	}

	public function categorylist() //ต้นแบบ หน้า cate / search
	{
		$setting = $this->AnimeModel->get_setting($this->anbranch);
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

		$list_category = $this->AnimeModel->get_category($this->anbranch);

		$body_data = [
			'list_category' => $list_category
		];


		echo view('templates/header.php', $header_data);
		echo view('category.php', $body_data);
		echo view('templates/footer.php');
	}

	public function popular() //ต้นแบบ หน้า cate / search
	{
		$setting = $this->VideoModel->get_setting($this->anbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list_category = $this->VideoModel->get_category($this->anbranch);
		$list = $this->VideoModel->get_list_popular($this->anbranch);
		$adsbottom = $this->VideoModel->get_adsbottom($this->anbranch);

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
		$setting = $this->AnimeModel->get_setting($this->anbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list = array() ;
		$keyword = urldecode(str_replace("'","\'",$keyword));
		$list = $this->AnimeModel->get_list_video($this->anbranch,  $keyword, $page);
		$adsbottom = $this->AnimeModel->get_adsbottom($this->anbranch);
		$list_category = $this->AnimeModel->get_category($this->anbranch);
		$list_popular = $this->AnimeModel->get_list_popular($this->anbranch);

		$chk_act = [
			'home' => '',
			'anime' => 'active',
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

		$body_data = [
			'url_loadmore' => base_url('moviedata_search'),
			'path_thumbnail' => $this->path_thumbnail,
			'list' => $list,
			'adsbottom' => $adsbottom,
			'path_ads' => $this->path_ads,
		];

		echo view('templates/header.php', $header_data);
		echo view('anime/search.php', $body_data);
		echo view('anime/footer.php');
		echo view('templates/footer.php');
	}

	public function category($cate_id, $cate_name)
	{
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$setting = $this->AnimeModel->get_setting($this->anbranch);
		$setting['setting_img'] = $this->path_setting . $setting['setting_logo'];

		$list = $this->AnimeModel->get_id_video_bycategory($this->anbranch, $cate_id, $page);
		$adsbottom = $this->AnimeModel->get_adsbottom($this->anbranch);
		$list_category = $this->AnimeModel->get_category($this->anbranch);
		$list_popular = $this->AnimeModel->get_list_popular($this->anbranch);
		
		$chk_act = [
			'home' => '',
			'anime' => 'active',
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
		echo view('anime/category.php', $body_data);
		echo view('anime/footer.php');
		echo view('templates/footer.php');
	}

	public function player($id, $index)
	{
		$video_data = $this->AnimeModel->get_id_video($id);
		$series = $this->AnimeModel->get_ep_series($id);
		$adsvideo = $this->AnimeModel->get_adsvideolist($this->backURL);
		
		$playerUrl =$video_data['movie_thmain'];

		
		if ($index != "") {
			$playerUrl =$series['ep_data'][$index]['EpData'] ;
		}

		$data = [
			'document_root' => $this->document_root,
			'branch' 		=> $this->anbranch,
			'backUrl' 		=> $this->backURL,
			'adsvideo'		=> $adsvideo,
			'playerUrl' 	=> $playerUrl
		];

		echo view('anime/player.php', $data);
	}

	public function countView($id)
	{
		$this->AnimeModel->countView($id);
	}

	public function save_requests()
	{
		$request_text = $_POST['request_anime_text'];

		$this->AnimeModel->save_requests($this->anbranch, $request_text);
	}

	public function con_ads()
	{
		$ads_con_name =$_POST['ads_con_name'];
		$ads_con_email = $_POST['ads_con_email'];
		$ads_con_line = $_POST['ads_con_line'];
		$ads_con_tel = $_POST['ads_con_tel'];

		$this->AnimeModel->con_ads($this->anbranch, $ads_con_name, $ads_con_email, $ads_con_line, $ads_con_tel);
	}

	public function saveReport()
	{


		$movie_id =  $_POST['movie_id'];
		$movie_name = $_POST['movie_name'];
		$movie_ep_name = $_POST['movie_ep_name'];
		$datetime = date('Y-m-d H:i:s');



		$result = $this->AnimeModel->save_reports($this->anbranch,$movie_id,$movie_name,$movie_ep_name,$datetime);


	}
}
