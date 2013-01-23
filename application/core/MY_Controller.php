<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract MY_Controller 扩展系统的控制器类(CI_Constroller)
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class MY_Controller extends CI_Controller{
		/*
		 * @abstract index 扩展其构告函数
		 * @access public
		 * */
		public function __construct(){
			parent::__construct();
			header("Content-type:text/html;charset=utf-8");  //设置编码
			date_default_timezone_set("PRC");  //设置时区
			$this->load->helper("url");  //创建url函数实例
		}
	}
?>