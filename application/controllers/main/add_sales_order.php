<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_sales_order 新增销售单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_sales_order extends MY_Controller{
		/*
		 * @abstract index 新增销售单主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/add_sales_order_model");
			$sales_data = array(
				"warehouse_res" => $this->add_sales_order_model->sel_warehouse()  //查找所有仓库
			);
			$this->load->view("main/add_sales_order",$sales_data);
		}
		/*
		 * @abstract sel_serial 查找会员
		 * @access public
		 * */
		public function sel_serial(){
			echo "<ul>";
			echo "<li name='sel_serial_li'><span>{$this->input->post("serial_number")}</span></li>";
			echo "</ul>";
		}
	}
?>