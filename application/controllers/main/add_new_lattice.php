<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_lattice 添加新仓储柜格子
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_lattice extends MY_Controller{
		/*
		 * @abstract index 添加新仓储柜格子主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/add_new_lattice_model");
			$lattice_data = array(
				"cabinet_res" => $this->add_new_lattice_model->sel_cabinet()  //查找所有仓储柜
			);
			$this->load->view("main/add_new_lattice",$lattice_data);
		}
		/*
		 * @abstract add_lattice 添加仓储柜格子
		 * @access public
		 * */
		public function add_lattice(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_lattice_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("lattice_name","格子名称","trim|required");
			$this->form_validation->set_rules("cabinet_id","所属仓储柜","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$lattice_data = array(
						"lattice_name" => $this->input->post("lattice_name"),  //格子名称
						"cabinet_id" => $this->input->post("cabinet_id"),  //所属仓储柜ID号
						"remark" => $this->input->post("remark")  //备注
				);
				if($this->add_new_lattice_model->add_lattice($lattice_data)){
					$success_data = array(
							"content" => "添加成功！",
							"url" => site_url("main/view_lattice_information"),
							"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "添加失败！",
							"url" => site_url("main/add_new_lattice"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/add_new_lattice"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>