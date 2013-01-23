<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Center 主间主框架
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Center extends MY_Controller{
		/*
		 * @abstract index 显示主框架
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/center");
		}
	}
?>