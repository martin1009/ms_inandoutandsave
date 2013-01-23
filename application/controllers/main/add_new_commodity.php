<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_commodity 添加新商品
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_commodity extends MY_Controller{
		/*
		 * @abstract index 添加新商品主页面
		 * @access public
		 * */
		public function index(){
			$this->load->view("main/add_new_commodity");
		}
		
		/*
		 * @abstract add_commodity 添加新商品
		 * @access public
		 * */
		public function add_commodity(){
			$this->load->library("form_validation");
			$this->load->model("main/add_new_commodity_model");  //载入模型
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
					"tag_price" => $this->input->post("tag_price"),  //吊牌价(参考价)
					"brand" => $this->input->post("brand"),  //品牌
					"remark" => $this->input->post("remark")  //备注
				);
				//查找默认仓库
				if($warehouse_id = $this->add_new_commodity_model->sel_warehouse_default()){
					//验证商品编号不能重复
					if($this->add_new_commodity_model->check_commodity($commodity_data['commodity_number'])){
						//添加商品
						if($commodity_id = $this->add_new_commodity_model->add_commodity($commodity_data)){
							$warehouse_commodity = array(
								"commodity_id" => $commodity_id,  //商品ID号
								"warehouse_id" => $warehouse_id,  //默认存储仓库ID号
								"inventory_number" => $this->input->post("inventory_number") ? $this->input->post("inventory_number") : 0  //库存数量
							);
							//添加库存
							if($this->add_new_commodity_model->add_commodity_warehouse($warehouse_commodity)){
								$success_data = array(
									"content" => "添加成功！",
									"url" => site_url("main/view_commodity_information"),
									"time" => 3
								);
								$this->load->view("prompt/success",$success_data);
							}else{
								$error_data = array(
									"content" => "商品信息添加成功，但入库时发生错误！",
									"url" => site_url("main/view_commodity_information"),
									"time" => 3
								);
								$this->load->view("prompt/success",$error_data);
							}
						}else{
							$error_data = array(
									"content" => "添加失败！",
									"url" => site_url("main/add_new_commodity"),
									"time" => 3
							);
							$this->load->view("prompt/error",$error_data);
						}
					}else{
						$error_data = array(
							"content" => "因此商品编号已经存在！添加失败！",
							"url" => site_url("main/add_new_commodity"),
							"time" => 3
						);
						$this->load->view("prompt/error",$error_data);
					}
				}else{
					$error_data = array(
						"content" => "因未发现默认存储仓库，添加失败！",
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
	}
?>