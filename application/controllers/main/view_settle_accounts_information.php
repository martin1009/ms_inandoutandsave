<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_settle_accounts_information 查看所有已结算入库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_settle_accounts_information extends MY_Controller{
		/*
		 * @abstract index 查看所有已结算入库单主页面
		 * @param $page 当前页
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/view_settle_accounts_information_model");
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->view_settle_accounts_information_model->sel_all_accounts_information_num();  //总条数
			$page_num = ceil($num_row/$page_row);  //总页数
			if($page > $page_num && $page_num != 0){
				$page = $page_num;
			}else if($page < 1){
				$page = 1;
			}
			$page_data = array(
					"page" => $page,  //当前页
					"page_row" => $page_row,  //每页显示条数
					"num_row" => $num_row,  //总条数
					"page_num" => $page_num  //总页数
			);
			$settle_accounts_data = array(
					"page_data" => $page_data,  //分页数组
					"settle_accounts_res" => $this->view_settle_accounts_information_model->sel_all_settle_accounts($page_data)  //所有已结算的入库单数据
			);
			$this->load->view("main/view_settle_accounts_information",$settle_accounts_data);
		}
	}
?>