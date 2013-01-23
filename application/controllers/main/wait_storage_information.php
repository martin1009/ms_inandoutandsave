<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Wait_storage_information 未结算入库单列表
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Wait_storage_information extends MY_Controller{
		/*
		 * @abstract index 未结算入库单列表主页面
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/wait_storage_information_model");  //载入模型
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->wait_storage_information_model->sel_all_wait_storage_num();  //总条数
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
			$wait_storage_data = array(
					"page_data" => $page_data,  //分页数组
					"wait_storage_res" => $this->wait_storage_information_model->sel_all_wait_storage($page_data)  //所有会员数据
			);
			$this->load->view("main/wait_storage_information",$wait_storage_data);
		}
		/*
		 * @abstract settlement_storage_order 结算入库单
		 * @param $storage_order_id 入库单ID号
		 * @access public
		 * */
		public function settlement_storage_order($storage_order_id){
			$this->load->model("main/wait_storage_information_model");
			//查找入库单详细信息
			if($detail_purchase_res = $this->wait_storage_information_model->sel_detail_purchase($storage_order_id)){
				//添加入商品库存信息中
				if($this->wait_storage_information_model->add_stock_information($detail_purchase_res)){
					$success_data = array(
						"content" => "结算成功！",
						"url" => site_url("main/wait_storage_information"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
						"content" => "结算失败！",
						"url" => site_url("main/wait_storage_information"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => "查找入库单详细信息时发生错误！",
					"url" => site_url("main/wait_storage_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>