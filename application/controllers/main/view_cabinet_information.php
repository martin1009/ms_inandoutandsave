<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_cabinet_information 查看所有仓储柜
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_cabinet_information extends MY_Controller{
		/*
		 * @abstract index 查看所有仓储柜主页面
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/view_cabinet_information_model");  //载入模型
			//分页数据
			$page_row = 21;  //每页显示条数
			$num_row = $this->view_cabinet_information_model->sel_all_cabinet_num();  //总条数
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
			$cabinet_data = array(
					"page_data" => $page_data,  //分页数组
					"cabinet_res" => $this->view_cabinet_information_model->sel_all_cabinet($page_data)  //所有仓储柜数据
			);
			$this->load->view("main/view_cabinet_information",$cabinet_data);
		}
		/*
		 * @abstract edit_cabinet_page 编辑指定仓储柜页面
		 * @param $cabinet_id 仓储柜ID号
		 * @access public
		 * */
		public function edit_cabinet_page($cabinet_id){
			$this->load->model("main/view_cabinet_information_model");
			$this->load->model("main/add_new_cabinet_model");
			$cabinet_data = array(
				"cabinet_res" => $this->view_cabinet_information_model->sel_cabinet($cabinet_id),  //查找指定仓储柜页面
				"warehouse_res" => $this->add_new_cabinet_model->sel_all_warehouse()  //所有仓库数据
			);
			$this->load->view("main/edit_cabinet_page",$cabinet_data);
		}
		/*
		 * @abstract edit_cabinet 执行编辑仓储柜
		 * @access public
		 * */
		public function edit_cabinet(){
			$this->load->library("form_validation");
			$this->load->model("main/view_cabinet_information_model");  //载入模型
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
					"cabinet_remark" => $this->input->post("remark")  //备注
				);
				if($this->view_cabinet_information_model->edit_cabinet($cabinet_data,$this->input->post("cabinet_id"))){
					$success_data = array(
						"content" => "修改成功！",
						"url" => site_url("main/view_cabinet_information"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
						"content" => "修改失败！",
						"url" => site_url("main/view_cabinet_information"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/view_cabinet_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_cabinet 删除指定仓储柜
		 * @param $cabinet_id 将删除的仓储柜ID号
		 * @access public
		 * */
		public function del_cabinet($cabinet_id){
			$this->load->model("main/view_cabinet_information_model");
			if($this->view_cabinet_information_model->del_cabinet($cabinet_id)){
				$success_data = array(
					"content" => "仓储柜删除成功！",
					"url" => site_url("main/view_cabinet_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$success_data);
			}else{
				$error_data = array(
					"content" => "仓储柜删除失败！",
					"url" => site_url("main/view_cabinet_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>