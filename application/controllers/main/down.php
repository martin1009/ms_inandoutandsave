<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Down 最底端框架
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Down extends MY_Controller{
		/*
		 * @abstract index 显示底端框架内容
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/down");
		}
	}
?>