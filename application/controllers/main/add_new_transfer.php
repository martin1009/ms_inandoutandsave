<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_transfer 新增调库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_transfer extends MY_Controller{
		/*
		 * @abstract index 新增调库单主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/add_new_transfer_model");
			$transfer_data = array(
				"warehouse_res" => $this->add_new_transfer_model->sel_warehouse()  //查找所有仓库
			);
			$this->load->view("main/add_new_transfer",$transfer_data);
		}
		/*
		 * @abstract open_selection_commodity 选择商品页面
		 * @access public
		 * */
		public function open_selection_commodity($commodity_number,$out_warehouse_id,$in_warehouse_id){
			$commodity_number = urldecode($commodity_number);
			$this->load->model("main/add_new_transfer_model");
			$warehouse_data = array(
				"out_warehouse_id" => $out_warehouse_id,  //出库ID
				"in_warehouse_id" => $in_warehouse_id  //入库ID
			);
			//模糊查询商品编号
			$commodity_data = array(
				"out_warehouse_name" => $this->add_new_transfer_model->sel_out_warehouse_name($warehouse_data),  //出货仓库名称
				"commodity_res" => $commodity_number == "-" ? $this->add_new_transfer_model->sel_all_commodity($warehouse_data) : $this->add_new_transfer_model->sel_commodity_fuzzy_number($commodity_number,$warehouse_data)  //按商品编号模糊查询
			);
			$this->load->view("main/open_transfer_commodity",$commodity_data);
		}
		/*
		 * @abstract add_order 执行添加调库单
		 * @access public
		 * */
		public function add_order(){
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
			$this->load->library("form_validation");
			$this->load->model("main/add_new_transfer_model");
			//防空验证
			$this->form_validation->set_result("transfer_order_number","调库单号","trim|required");
			$this->form_validation->set_result("transfer_date","日期","trim|required");
			$this->form_validation->set_result("out_warehouse_id","出货仓库","trim|required");
			$this->form_validation->set_result("in_warehouse_id","入货仓库","trim|required");
			$this->form_validation->set_result("commodity_id","商品","trim|required");
			$this->form_validation->set_result("num","数量","trim|required");
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取调库单基本数据
				$transfer_order_data = array(
					"transfer_date" => $this->input->post("transfer_date"),  //单据日期
					"transfer_order_number" => $this->input->post("transfer_order_number"),  //入库单号
					"out_warehouse_id" => $this->input->post("out_warehouse_id"),  //出库ID
					"in_warehouse_id" => $this->input->post("in_warehouse_id"),  //入库ID号
					"commodity_num" => $this->input->post("commodity_num"),  //整单商品数量
					"remark" => $this->input->post("remark")  //备注
				);
				//插入调库单基本表
				if($transfer_order_id = $this->add_new_transfer_model->add_transfer_order($transfer_order_data)){
					//获取调库单详细数据
					$transfer_detail_order_data = array(
						"transfer_bill_id" => $transfer_order_id,  //所属调库单ID号
						"commodity_id_res" => $this->input->post("commodity_id"),  //商品ID数组
						"num_res" => $this->input->post("num")  //商品数量数组
					);
					if($this->add_new_transfer_model->add_transfer_detail_order($transfer_detail_order_data)){
						$success_data = array(
							"content" => "调库单添加成功！",
							"url" => site_url("main/add_new_transfer"),
							"time" => 3
						);
						$this->load->view("prompt/success",$success_data);
					}else{
						$error_data = array(
							"content" => "插入调库单详细表时发生错误！",
							"url" => site_url("main/add_new_transfer"),
							"time" => 3
						);
						$this->load->view("prompt/error",$error_data);
					}
				}else{
					$error_data = array(
						"content" => "插入调库单基本表时发生错误！",
						"url" => site_url("main/add_new_transfer"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/add_new_transfer"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>