<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_member_information 查看所有会员
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_member_information extends MY_Controller{
		/*
		 * @abstract index 显示所有会员资料
		 * @access public
		 * */
		public function index($page = 1){
			$this->load->model("main/view_member_information_model");  //载入模型
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->view_member_information_model->sel_all_member_num();  //总条数
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
			$member_data = array(
				"page_data" => $page_data,  //分页数组
				"member_res" => $this->view_member_information_model->sel_all_member($page_data)  //所有会员数据
			);
			$this->load->view("main/view_member_information",$member_data);
		}
		/*
		 * @abstract edit_member_page 编辑会员页面
		 * @param $member_id 编辑的会员ID号
		 * @access public
		 * */
		public function edit_member_page($member_id){
			$this->load->model("main/view_member_information_model");
			$member_data = array(
				"member" => $this->view_member_information_model->sel_member($member_id)  //编辑的会员数据
			);
			$this->load->view("main/edit_member_page",$member_data);
		}
		/*
		 * @abstract edit_member 执行编辑会员命令
		 * @access public
		 * */
		public function edit_member(){
			$this->load->library("form_validation");
			$this->load->model("main/view_member_information_model");  //载入模型
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
				if($this->view_member_information_model->edit_member($member_data,$this->input->post("member_id"))){
					$success_data = array(
							"content" => "添加成功！",
							"url" => site_url("main/view_member_information"),
							"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "添加失败！",
							"url" => site_url("main/view_member_information"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/view_member_information"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_member 删除指定会员
		 * @param $member_id 删除会员的ID
		 * @access public
		 * */
		public function del_member($member_id){
			$this->load->model("main/view_member_information_model");
			if($this->view_member_information_model->del_member($member_id)){
				$success_data = array(
					"content" => "删除成功！",
					"url" => site_url("main/view_member_information"),
					"time" => 3
				);
				$this->load->view("prompt/success",$success_data);
			}
		}
	}
?>