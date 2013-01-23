<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Main 登陆后的主页面
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Main extends MY_Controller{
		/*
		 * @abstract index 主页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/main");
		}
	}
?>