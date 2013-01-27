<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_transfer_information 查看所有调库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_transfer_information extends MY_Controller{
		/*
		 * @abstract index 查看调库单主页面
		 * @param $page 当前页
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/view_transfer_information_model");  //载入模型
			//分页数据
			$page_row = 21;  //每页显示条数
			$num_row = $this->view_transfer_information_model->sel_all_transfer_num();  //总条数
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
			$transfer_data = array(
					"page_data" => $page_data,  //分页数组
					"warehouse" => $this->view_transfer_information_model->sel_all_warehouse(),  //查找所有仓库
					"transfer_res" => $this->view_transfer_information_model->sel_all_transfer($page_data)  //所有仓储柜数据
			);
			$this->load->view("main/view_transfer_information",$transfer_data);
		}
	}
?>