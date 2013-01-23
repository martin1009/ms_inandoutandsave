<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_gift 添加新仓储柜
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_gift extends MY_Controller{
		/*
		 * @abstract index 添加新仓储柜主页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/add_new_gift");
		}
		/*
		 * @abstract add_gift 添加礼品资料
		 * @access public
		 * */
		public function add_gift(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_gift_model");  //载入模型
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
				if($this->add_new_gift_model->add_gift($gift_data)){
					$success_data = array(
							"content" => "添加成功！",
							"url" => site_url("main/add_new_gift"),
							"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "添加失败！",
							"url" => site_url("main/add_new_gift"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/add_new_gift"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>