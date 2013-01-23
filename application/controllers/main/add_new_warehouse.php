<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_warehouse 添加新商品
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_warehouse extends MY_Controller{
		/*
		 * @abstract index 添加新商品主页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/add_new_warehouse");
		}
		
		/*
		 * @abstract add_warehouse 添加新仓库
		 * @access public
		 * */
		public function add_warehouse(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_warehouse_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("warehouse_name","仓库名称","trim|required");
			$this->form_validation->set_rules("warehouse_default","仓库默认状态","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$warehouse_data = array(
						"warehouse_name" => $this->input->post("warehouse_name"),  //仓库名称
						"warehouse_address" => $this->input->post("warehouse_address"),  //仓库地址
						"warehouse_type" => $this->input->post("warehouse_type"),  //仓库类型
						"warehouse_default" => $this->input->post("warehouse_default"),  //默认状态
						"remark" => $this->input->post("remark")  //仓库备注
				);
				if($this->add_new_warehouse_model->check_warehouse($warehouse_data)){
					if($this->add_new_warehouse_model->add_warehouse($warehouse_data)){
						$success_data = array(
							"content" => "添加成功！",
							"url" => site_url("main/view_warehouse_information"),
							"time" => 3
						);
						$this->load->view("prompt/success",$success_data);
					}else{
						$error_data = array(
							"content" => "添加失败！",
							"url" => site_url("main/add_new_warehouse"),
							"time" => 3
						);
						$this->load->view("prompt/error",$error_data);
					}
				}else{
					$error_data = array(
						"content" => "此类型仓库已添加默认，不能再次添加默认仓库！",
						"url" => site_url("main/add_new_warehouse"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/add_new_warehouse"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>