<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_cabinet 添加新仓储柜
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_cabinet extends MY_Controller{
		/*
		 * @abstract index 添加新仓储柜主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/add_new_cabinet_model");
			$cabinet_data = array(
				"warehouse_res" => $this->add_new_cabinet_model->sel_all_warehouse()  //所有仓库数据
			);
			$this->load->view("main/add_new_cabinet",$cabinet_data);
		}
		/*
		 * @abstract add_cabinet 添加新仓储柜
		 * @access public
		 * */
		public function add_cabinet(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_cabinet_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("cabinet_name","仓储柜名称","trim|required");
			$this->form_validation->set_rules("warehouse_id","所属仓库","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$cabinet_data = array(
					"cabinet_name" => $this->input->post("cabinet_name"),  //仓储柜名称
					"warehouse_id" => $this->input->post("warehouse_id"),  //所属仓库ID号
					"remark" => $this->input->post("remark")  //备注
				);
				if($this->add_new_cabinet_model->add_cabinet($cabinet_data)){
					$success_data = array(
						"content" => "添加成功！",
						"url" => site_url("main/view_cabinet_information"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
						"content" => "添加失败！",
						"url" => site_url("main/add_new_cabinet"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/add_new_cabinet"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>