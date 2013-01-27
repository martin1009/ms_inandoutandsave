<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_commodity_information 查看所有商品信息
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_commodity_information extends MY_Controller{
		/*
		 * @abstract index 查看所有商品
		 * @param $page 当前页
		 * @access public
		 * */
		public function index($page=1){
			$this->load->model("main/view_commodity_information_model");  //载入模型
			//分页数据
			$page_row = 21;  //每页显示条数
			$num_row = $this->view_commodity_information_model->sel_all_commodity_num();  //总条数
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
				"commodity_res" => $this->view_commodity_information_model->sel_all_commodity($page_data)  //所有员工数据
			);
			$this->load->view("main/view_commodity_information",$commodity_data);
		}
		
		/*
		 * @abstract edit_commodity_page 编辑指定商品页面
		 * @param $commodity_id 商品ID号
		 * @access public
		 * */
		public function edit_commodity_page($commodity_id){
			$this->load->model("main/view_commodity_information_model");
			$commodity_data = array(
					"commodity" => $this->view_commodity_information_model->sel_commodity($commodity_id)  //查找指定员工信息
			);
			$this->load->view("main/edit_commodity_page",$commodity_data);
		}
		/*
		 * @abstract edit_commodity 执行编辑指定商品
		 * @access public
		 * */
		public function edit_commodity(){
			$this->load->library("form_validation");
			$this->load->model("main/view_commodity_information_model");  //载入模型
			//防空验证
			$this->form_validation->set_rules("commodity_number","商品编号","trim|required");
			$this->form_validation->set_rules("commodity_name","商品名称","trim|required");
			$this->form_validation->set_rules("dan_wei","商品单位","trim|required");
			$this->form_validation->set_rules("commodity_serial_number","货号","trim|required");
			$this->form_validation->set_rules("commodity_color","商品颜色","trim|required");
			$this->form_validation->set_rules("commodity_size","商品尺码","trim|required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取数据
				$commodity_data = array(
					"commodity_number" => $this->input->post("commodity_number"),  //商品编号
					"commodity_name" => $this->input->post("commodity_name"),  //商品名称
					"dan_wei" => $this->input->post("dan_wei"),  //商品单位
					"commodity_serial_number" => $this->input->post("commodity_serial_number"),  //货号
					"commodity_color" => $this->input->post("commodity_color"),  //商品颜色
					"commodity_size" => $this->input->post("commodity_size"),  //商品尺码
					"tag_price" => $this->input->post("tag_price"),  //吊牌价（参考价）
					"brand" => $this->input->post("brand"),  //品牌
					"remark" => $this->input->post("remark")  //备注
				);
				if($this->view_commodity_information_model->edit_commodity($commodity_data,$this->input->post("commodity_id"))){
					$success_data = array(
							"content" => "修改成功！",
							"url" => site_url("main/view_commodity_information"),
							"time" => 3
					);
					$this->load->view("prompt/success",$success_data);
				}else{
					$error_data = array(
							"content" => "修改失败！",
							"url" => site_url("main/add_new_commodity"),
							"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
						"content" => validation_errors(),
						"url" => site_url("main/add_new_commodity"),
						"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
		/*
		 * @abstract del_commodity 删除指定商品
		 * @param $commodity_id 商品ID号
		 * @access public
		 * */
		public function del_commodity($commodity_id){
			$this->load->model("main/view_commodity_information_model");
			if($this->view_commodity_information_model->del_commodity($commodity_id)){
				$success_data = array(
					"content" => "商品删除成功！",
					"url" => site_url("main/view_commodity_information"),
					"time" => 3
				);
				$this->load->view("prompt/success",$success_data);
			}else{
				$error_data = array(
					"content" => "商品删除失败！",
					"url" => site_url("main/view_commodity_information"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>