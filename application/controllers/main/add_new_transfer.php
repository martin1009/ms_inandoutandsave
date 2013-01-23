<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_transfer 新增调库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_transfer extends MY_Controller{
		/*
		 * @abstract index 新增调库单主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/add_new_transfer_model");
			$transfer_data = array(
				"warehouse_res" => $this->add_new_transfer_model->sel_warehouse()  //查找所有仓库
			);
			$this->load->view("main/add_new_transfer",$transfer_data);
		}
		/*
		 * @abstract open_selection_commodity 选择商品页面
		 * @access public
		 * */
		public function open_selection_commodity($commodity_number,$out_warehouse_id,$in_warehouse_id){
			$commodity_number = urldecode($commodity_number);
			$this->load->model("main/add_new_transfer_model");
			$warehouse_data = array(
				"out_warehouse_id" => $out_warehouse_id,  //出库ID
				"in_warehouse_id" => $in_warehouse_id  //入库ID
			);
			//模糊查询商品编号
			$commodity_data = array(
				"out_warehouse_name" => $this->add_new_transfer_model->sel_out_warehouse_name($warehouse_data),  //出货仓库名称
				"commodity_res" => $commodity_number == "-" ? $this->add_new_transfer_model->sel_all_commodity($warehouse_data) : $this->add_new_transfer_model->sel_commodity_fuzzy_number($commodity_number,$warehouse_data)  //按商品编号模糊查询
			);
			$this->load->view("main/open_transfer_commodity",$commodity_data);
		}
		/*
		 * @abstract add_order 执行添加调库单
		 * @access public
		 * */
		public function add_order(){
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			
		}
	}
?>