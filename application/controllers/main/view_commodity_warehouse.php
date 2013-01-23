<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_commodity_warehouse 查看所有商品库存
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_commodity_warehouse extends MY_Controller{
		/*
		 * @abstract index 查看所有商品库存主界面
		 * @access public
		 * */
		public function index($page = 1){
			$this->load->model("main/view_commodity_warehouse_model");  //载入模型
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->view_commodity_warehouse_model->sel_all_commodity_warehouse_num();  //总条数
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
			$commodity_warehouse_data = array(
				"page_data" => $page_data,  //分页数组
				"commodity_warehouse_res" => $this->view_commodity_warehouse_model->sel_all_commodity_warehouse($page_data)  //所有商品库存数据
			);
			$this->load->view("main/view_commodity_warehouse",$commodity_warehouse_data);
		}
		/*
		 * @abstract edit_commodity_warehouse_page 编辑商品库存页面
		 * @param $commodity_warehouse_id 商品库存ID号
		 * @access public
		 * */
		public function edit_commodity_warehouse_page($commodity_warehouse_id){
			$this->load->model("main/view_commodity_warehouse_model");
			$commodity_warehouse_data = array(
				"commodity_warehouse" => $this->view_commodity_warehouse_model->sel_commodity_warehouse($commodity_warehouse_id)  //查找指定商品库存信息
			);
			$this->load->view("main/edit_commodity_warehouse_page",$commodity_warehouse_data);
		}
		/*
		 * @abstract edit_commodity_warehouse 执行编辑商品
		 * @access public
		 * */
		public function edit_commodity_warehouse(){
			$this->load->model("main/view_commodity_warehouse_model");
			$this->load->library("form_validation");
			//防空验证
			$this->form_validation->set_rules("inventory_number","商品库存","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				$commodity_warehouse_data = array(
					"id" => $this->input->post("commodity_warehouse_id"),  //商品库存ID号
					"inventory_number" => $this->input->post("inventory_number")  //剩余库存
				);
				if($this->view_commodity_warehouse_model->edit_commodity_warehouse($commodity_warehouse_data)){
					$success_data = array(
						"content" => "库存修改成功！",
						"url" => site_url("main/view_commodity_warehouse"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
						"content" => "库存修改失败！",
						"url" => site_url("main/view_commodity_warehouse"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/view_commodity_warehouse"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_commodity_warehouse 删除商品库存
		 * @param $commodity_warehouse_id 商品库存ID号
		 * @access public
		 * */
		public function del_commodity_warehouse($commodity_warehouse_id){
			$this->load->model("main/view_commodity_warehouse_model");
			if($this->view_commodity_warehouse_model->del_commodity_warehouse($commodity_warehouse_id)){
				$success_data = array(
					"content" => "删除成功！",
					"url" => site_url("main/view_commodity_warehouse"),
					"time" => 3
				);
				$this->load->view("prompt/success",$success_data);
			}else{
				$error_data = array(
					"content" => "删除失败！",
					"url" => site_url("main/view_commodity_warehouse"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>