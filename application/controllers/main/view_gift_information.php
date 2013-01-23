<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_gift_information 查看礼品资料
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_gift_information extends MY_Controller{
		/*
		 * @abstract index 查看所有礼品资料
		 * @param $page 当前页
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/view_gift_information_model");  //载入模型
			//分页数据
			$page_row = 15;  //每页显示条数
			$num_row = $this->view_gift_information_model->sel_all_gift_num();  //总条数
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
			$gift_data = array(
					"page_data" => $page_data,  //分页数组
					"gift_res" => $this->view_gift_information_model->sel_all_gift($page_data)  //所有仓储柜数据
			);
			$this->load->view("main/view_gift_information",$gift_data);
		}
		/*
		 * @abstract edit_gift_page 编辑礼品资料页面
		 * @param $gift_id 礼品ID号
		 * @access public
		 * */
		public function edit_gift_page($gift_id){
			$this->load->model("main/view_gift_information_model");
			$gift_data = array(
				"gift" => $this->view_gift_information_model->sel_gift($gift_id)  //编辑指定礼品资料
			);
			$this->load->view("main/edit_gift_page",$gift_data);
		}
		/*
		 * @abstract edit_gift 执行编辑礼品资料
		 * @access public
		 * */
		public function edit_gift(){
			$this->load->library("form_validation");
			$this->load->model("main/view_gift_information_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("name","礼品名称","trim|required");
			$this->form_validation->set_rules("number","礼品数量","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$gift_data = array(
					"name" => $this->input->post("name"),  //礼品名称
					"number" => $this->input->post("number"),  //礼品数量
					"mark" => $this->input->post("mark")  //备注
				);
				if($this->view_gift_information_model->edit_gift($gift_data,$this->input->post("gift_id"))){
					$success_data = array(
						"content" => "添加成功！",
						"url" => site_url("main/view_gift_information"),
						"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
						"content" => "添加失败！",
						"url" => site_url("main/view_gift_information"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/view_gift_information"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>