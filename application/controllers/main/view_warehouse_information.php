<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_warehouse_information 查看所有会员
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_warehouse_information extends MY_Controller{
		/*
		 * @abstract index 显示所有仓库资料
		 * @access public
		 * */
		public function index($page = 1){
			$this->load->model("main/view_warehouse_information_model");  //载入模型
			//分页数据
			$page_row = 21;  //每页显示条数
			$num_row = $this->view_warehouse_information_model->sel_all_warehouse_num();  //总条数
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
			$warehouse_data = array(
					"page_data" => $page_data,  //分页数组
					"warehouse_res" => $this->view_warehouse_information_model->sel_all_warehouse($page_data)  //所有会员数据
			);
			$this->load->view("main/view_warehouse_information",$warehouse_data);
		}
		/*
		 * @abstract edit_warehouse_page 显示编辑仓库页面
		 * @access public
		 * */
		public function edit_warehouse_page($warehouse_id){
			$this->load->model("main/view_warehouse_information_model");
			$warehouse_data = array(
				"warehouse" => $this->view_warehouse_information_model->sel_warehouse($warehouse_id)  //查找指定仓库资料
			);
			$this->load->view("main/edit_warehouse_page",$warehouse_data);
		}
		/*
		 * @abstract edit_warehouse 执行编辑
		 * @access public
		 * */
		public function edit_warehouse(){
			$this->load->library("form_validation");
			$this->load->model("main/view_warehouse_information_model");  //载入模型
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
						"warehouse_default" => $this->input->post("warehouse_default"),  //仓库默认状态
						"remark" => $this->input->post("remark")  //仓库备注
				);
				if($this->view_warehouse_information_model->edit_warehouse($warehouse_data,$this->input->post("warehouse_id"))){
					$success_data = array(
							"content" => "修改成功！",
							"url" => site_url("main/view_warehouse_information"),
							"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "修改失败！",
							"url" => site_url("main/view_warehouse_information"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/view_warehouse_information"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_warehouse 删除指定仓库
		 * @param $warehouse_id 删除仓库的ID号
		 * @access public
		 * */
		public function del_warehouse($warehouse_id){
			$this->load->model("main/view_warehouse_information_model");
			if($this->view_warehouse_information_model->del_warehouse($warehouse_id)){
				$success_data = array(
					"content" => "删除成功！",
					"url" => site_url("main/view_warehouse_information"),
					"time" => 3
				);
				$this->load->view("prompt/success",$success_data);
			}else{
				$error_data = array(
						"content" => "删除失败！",
						"url" => site_url("main/view_warehouse_information"),
						"time" => 3
				);
				$this->load->view("prompt/success",$error_data);
			}
		}
	}
?>