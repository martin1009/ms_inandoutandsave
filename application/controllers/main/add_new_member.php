<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_member 添加新员工
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_member extends MY_Controller{
		/*
		 * @abstract index 添加新员工主页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/add_new_member");
		}
		/*
		 * @abstract add_member 添加新会员
		 * @access public
		 * */
		public function add_member(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_member_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("name","姓名","trim|required");
			$this->form_validation->set_rules("sex","性别","trim|required");
			$this->form_validation->set_rules("serial_number","会员卡号","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$member_data = array(
						"name" => $this->input->post("name"),  //会员姓名
						"sex" => $this->input->post("sex"),  //会员性别
						"age" => $this->input->post("age"),  //会员年龄
						"serial_number" => $this->input->post("serial_number"),  //会员卡号
						"tel" => $this->input->post("tel"),  //会员电话
						"birthday" => $this->input->post("birthday"),  //会员生日
						"remark" => $this->input->post("remark")  //备注
				);
				if($this->add_new_member_model->add_member($member_data)){
					$success_data = array(
							"content" => "添加成功！",
							"url" => site_url("main/add_new_member"),
							"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "添加失败！",
							"url" => site_url("main/add_new_member"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/add_new_member"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>