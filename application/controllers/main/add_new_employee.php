<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_employee 添加新员工
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_employee extends MY_Controller{
		/*
		 * @abstract index 添加新员工页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/add_new_employee");
		}
		/*
		 * @abstract add_employee 执行添加新员工
		 * @access public
		 * */
		public function add_employee(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_employee_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("name","姓名","trim|required");
			$this->form_validation->set_rules("sex","性别","trim|required");
			$this->form_validation->set_rules("number","员工编号","trim|required");
			$this->form_validation->set_rules("entry_time","入职时间","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$employee_data = array(
					"name" => $this->input->post("name"),  //员工姓名
					"sex" => $this->input->post("sex"),  //员工性别
					"age" => $this->input->post("age"),  //员工年龄
					"number" => $this->input->post("number"),  //员工编号
					"tel" => $this->input->post("tel"),  //员工联系方式
					"identity_card" => $this->input->post("identity_card"),  //员工身份证号
					"entry_time" => strtotime($this->input->post("entry_time")),  //入职时间
					"remarks" => $this->input->post("remarks")  //备注
				);
				if($this->add_new_employee_model->add_employee($employee_data)){
					$success_data = array(
						"content" => "添加成功！",
						"url" => site_url("main/add_new_employee"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "添加失败！",
							"url" => site_url("main/add_new_employee"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/add_new_employee"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>