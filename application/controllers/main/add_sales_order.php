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
		 * @abstract sel_serial 查找会员(AJAX用)
		 * @access public
		 * */
		public function sel_serial(){
			$this->load->model("main/add_sales_order_model");
			//获取数据
			$serial_number = $this->input->post("serial_number");
			//模糊搜索
			$serial_res = $this->add_sales_order_model->sel_vague_serial($serial_number);
			if($serial_res != false){
				$i = 0;
				foreach($serial_res as $serial){
					echo "<ul>";
					echo "<li name='sel_serial_li' lang='{$i}'><span name='serial_number_{$i}'>{$serial['serial_number']}</span>&nbsp;&nbsp;<span name='name'>{$serial['name']}</span></li>";
					echo "</ul>";
					$i++;
				}
			}
		}
		/*
		 * @abstract sel_gift 查找礼品(AJAX用)
		 * @access public
		 * */
		public function sel_gift(){
			$this->load->model("main/add_sales_order_model");
			//获取数据
			$gift_name = $this->input->post("gift_name");
			//模糊搜索
			$gift_res = $this->add_sales_order_model->sel_vague_gift($gift_name);
			if($gift_res != false){
				$i = 0;
				foreach($gift_res as $gift){
					echo "<ul>";
					echo "<li name='sel_gift_li' lang='{$i}'><span name='gift_name_{$i}'>{$gift['name']}</span>&nbsp;&nbsp;<span name='number'>{$gift['number']}</span></li>";
					echo "</ul>";
					$i++;
				}
			}
		}
		/*
		 * @abstract open_selection_commodity 选择商品页面
		 * @access public
		 * */
		public function open_selection_commodity($commodity_number){
			$commodity_number = urldecode($commodity_number);
			$this->load->model("main/add_sales_order_model");
			//模糊查询商品编号
			$commodity_data = array(
				"commodity_res" => $commodity_number == "-" ? $this->add_sales_order_model->sel_all_commodity($commodity_number) : $this->add_sales_order_model->sel_commodity_fuzzy_number($commodity_number)  //按商品编号模糊查询
			);
			$this->load->view("main/open_selection_commodity",$commodity_data);
		}
	}
?>