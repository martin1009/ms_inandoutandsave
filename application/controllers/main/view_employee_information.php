<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_employee_information 查看所有员工资料
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_employee_information extends MY_Controller{
		/*
		 * @abstract index 显示所有员工资料
		 * @param $page 当前页
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/view_employee_information_model");  //载入模型
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->view_employee_information_model->sel_all_commodity_num();  //总条数
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
			$commodity_data = array(
				"page_data" => $page_data,  //分页数组
				"commodity_res" => $this->view_employee_information_model->sel_all_commodity($page_data)  //所有员工数据
			);
			$this->load->view("main/view_employee_information",$commodity_data);
		}
		/*
		 * @abstract edit_commodity_page 编辑指定员工页面
		 * @param $commodity_id 指定员工ID号
		 * @access public
		 * */
		public function edit_employee_page($employee_id){
			$this->load->model("main/view_employee_information_model");
			$employee_data = array(
				"employee" => $this->view_employee_information_model->sel_employee($employee_id)  //查找指定员工信息
			);
			$this->load->view("main/edit_employee_page",$employee_data);
		}
		/*
		 * @abstract edit_commodity 执行编辑
		 * @access public
		 * */
		public function edit_employee(){
			$this->load->library("form_validation");
			$this->load->model("main/view_employee_information_model");  //载入模型
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
				$commodity_id = $this->input->post("commodity_id");  //指定的员工ID号
				if($this->view_employee_information_model->edit_employee($employee_data,$commodity_id)){
					$success_data = array(
						"content" => "修改成功！",
						"url" => site_url("main/view_employee_information"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "修改失败！",
							"url" => site_url("main/view_employee_information"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/view_employee_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_commodity 删除员工
		 * @param $commodity_id 员工ID号
		 * @access public
		 * */
		public function del_employee($commodity_id){
			$this->load->model("main/view_employee_information_model");
			if($this->view_employee_information_model->del_employee($commodity_id)){
				$success_data = array(
						"content" => "删除成功！",
						"url" => site_url("main/view_employee_information"),
						"time" => 3
				);
				$this->load->view("prompt/error",$success_data);
			}else{
				$error_data = array(
						"content" => "删除失败！",
						"url" => site_url("main/view_employee_information"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>