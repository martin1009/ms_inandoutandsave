<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Left 左侧工具栏
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Left extends MY_Controller{
		/*
		 * @abstract index 显示左侧工具栏页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/left");
		}
	}
?>