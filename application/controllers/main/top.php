<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Top 最顶端框架
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Top extends MY_Controller{
		/*
		 * @abstract index 显示顶端页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/top");
		}
	}
?>