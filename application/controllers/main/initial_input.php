<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Initial_input 期初库存录入
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Initial_input extends MY_Controller{
		/*
		 * @abstract index 录入主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/initial_input_model");
			$initial_input_data = array(
				"warehouse_res" => $this->initial_input_model->sel_warehouse()  //查找所有仓库
			);
			$this->load->view("main/initial_input",$initial_input_data);
		}
		/*
		 * @abstract input_commodity 商品入库
		 * @access public
		 * */
		public function input_commodity(){
			$this->load->library("form_validation");
			$this->load->model("main/initial_input_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("commodity_number","商品编号","trim|required");
			$this->form_validation->set_rules("input_num","入库数量","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				if($commodity_id = $this->input->post("commodity_id") ? $this->input->post("commodity_id") : $this->initial_input_model->sel_commodity_id($this->input->post("commodity_number"))){
					//获取数据
					$initial_data = array(
						"commodity_id" => $commodity_id,  //商品ID号
						"inventory_number" => $this->input->post("input_num"),  //入库数量
						"warehouse_id" => $this->input->post("warehouse_id"),  //仓库ID号
					);
					//检查此仓库中的此商品是否已经存在
					if($this->initial_input_model->check_commodity($initial_data)){
						//商品入库
						if($this->initial_input_model->input_commodity($initial_data)){
							$success_data = array(
								"content" => "入库成功！",
								"url" => site_url("main/initial_input"),
								"time" => 3
							);
							$this->load->view("prompt/success",$success_data);
						}else{
							$error_data = array(
								"content" => "入库失败！",
								"url" => site_url("main/initial_input"),
								"time" => 3
							);
							$this->load->view("prompt/error",$error_data);
						}
					}else{
						$error_data = array(
							"content" => "此仓库中已经存在此商品，请直接修改库存数量！",
							"url" => site_url("main/initial_input"),
							"time" => 3
						);
						$this->load->view("prompt/error",$error_data);
					}
				}else{
					$error_data = array(
						"content" => "此商品编号不存在，请确认后输入！",
						"url" => site_url("main/initial_input"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/initial_input"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>