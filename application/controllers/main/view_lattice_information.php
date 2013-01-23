<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_lattice_information 查看所有仓储柜格子
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_lattice_information extends MY_Controller{
		/*
		 * @abstract index 查看所有仓储柜格子主页面
		 * @access public
		 * */
		public function index($page = 1){
			$this->load->model("main/view_lattice_information_model");  //载入模型
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->view_lattice_information_model->sel_all_lattice_num();  //总条数
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
			$lattice_data = array(
					"page_data" => $page_data,  //分页数组
					"lattice_res" => $this->view_lattice_information_model->sel_all_lattice($page_data)  //所有仓储柜数据
			);
			$this->load->view("main/view_lattice_information",$lattice_data);
		}
		/*
		 * @abstract edit_lattice_page 编辑格子页面
		 * @param $lattice_id 编辑格子ID号
		 * @access public
		 * */
		public function edit_lattice_page($lattice_id){
			$this->load->model("main/view_lattice_information_model");
			$this->load->model("main/add_new_lattice_model");  //载入添加格子模型，用于查找所有仓储柜用
			$lattice_data = array(
				"lattice" => $this->view_lattice_information_model->sel_lattice($lattice_id),  //查找指定格子信息
				"cabinet_res" => $this->add_new_lattice_model->sel_cabinet()  //查找所有仓储柜信息
			);
			$this->load->view("main/edit_lattice_page",$lattice_data);
		}
		/*
		 * @abstract edit_lattice 执行编辑格子
		 * @access public
		 * */
		public function edit_lattice(){
			$this->load->library("form_validation");
			$this->load->model("main/view_lattice_information_model");  //载入模型
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
				if($this->view_lattice_information_model->edit_lattice($lattice_data,$this->input->post("lattice_id"))){
					$success_data = array(
						"content" => "添加成功！",
						"url" => site_url("main/view_lattice_information"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
						"content" => "添加失败！",
						"url" => site_url("main/view_lattice_information"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/view_lattice_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_lattice 删除指定格子
		 * @param $lattice_id 格子ID号
		 * @access public
		 * */
		public function del_lattice($lattice_id){
			$this->load->model("main/view_lattice_information_model");
			if($this->view_lattice_information_model->del_lattice($lattice_id)){
				$success_data = array(
					"content" => "删除成功！",
					"url" => site_url("main/view_lattice_information"),
					"time" => 3
				);
				$this->load->view("prompt/success",$success_data);
			}else{
				$error_data = array(
					"content" => "删除失败！",
					"url" => site_url("main/view_lattice_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>