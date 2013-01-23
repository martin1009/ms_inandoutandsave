<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract New_sales_order 新增销售单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class New_sales_order extends MY_Controller{
		/*
		 * @abstract index 新增销售单主页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/new_sales_order");
		}
	}
?>