<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Login 登陆控制器
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Login extends MY_Controller{
		/*
		 * @abstract 构造函数
		 * @access pbulic
		 * */
		public function __construct(){
			parent::__construct();
		}
		/*
		 * @abstract index 显示登陆主界面
		 * @access pbulic
		 * */
		public function index(){
			$this->load->view("login/index");
		}
		/*
		 * @abstract check_enter 验证登陆信息
		 * @access public
		 * */
		public function check_enter(){
			//防空验证
			$this->load->library("form_validation");
			$this->form_validation->set_rules("username","用户名","trim|required");
			$this->form_validation->set_rules("password","密码","trim|required");
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$check_data = array(
					"username" => $this->input->post("username"),  //用户名
					"password" => md5($this->input->post("password"))  //密码
				);
				//创建模型，验证数据
				$this->load->model("login/login_model");
				if($this->login_model->check_user_pass($check_data)){
					//登陆成功
					redirect("main/main","refresh");
				}else{
					//登陆失败
					$error_data = array(
							"content" => "用户名或密码错误！",  //所有错误信息
							"url" => site_url("login/login"),  //跳转地址
							"time" => 3  //等待秒数
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				//有空信息
				$error_data = array(
					"content" => validation_errors(),  //所有错误信息
					"url" => site_url("login/login"),  //跳转地址
					"time" => 3  //等待秒数
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>