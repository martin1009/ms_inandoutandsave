<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_storage_order 新增入库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_storage_order extends MY_Controller{
		/*
		 * @abstract index 新增入库单主页面
		 * @access public
		 * */
		public function index(){
			$this->load->model("main/add_storage_order_model");
			$storage_data = array(
				"warehouse_res" => $this->add_storage_order_model->sel_warehouse()  //查找所有仓库
			);
			$this->load->view("main/add_storage_order",$storage_data);
		}
		/*
		 * @abstract open_selection_commodity 选择商品页面
		 * @access public
		 * */
		public function open_selection_commodity($commodity_number){
			$commodity_number = urldecode($commodity_number);
			$this->load->model("main/add_storage_order_model");
			//模糊查询商品编号
			$commodity_data = array(
				"commodity_res" => $commodity_number == "-" ? $this->add_storage_order_model->sel_all_commodity($commodity_number) : $this->add_storage_order_model->sel_commodity_fuzzy_number($commodity_number)  //按商品编号模糊查询
			);
			$this->load->view("main/open_selection_commodity",$commodity_data);
		}
		/*
		 * @abstract ajax_sel_commodity 模糊查找商品
		 * @access public
		 * */
		public function ajax_sel_commodity(){
			$this->load->model("main/add_storage_order_model");
			//获取数据
			$commodity_number = $this->input->post("commodity_number");
			if($commodity_res = $this->add_storage_order_model->sel_commodity_fuzzy_number($commodity_number)){
				foreach($commodity_res as $commodity){
					echo "<tr name='tr_state' id='tr_{$commodity['id']}'>";
					echo "<td style='text-align:center;'><input type='radio' name='state' id='state_{$commodity['id']}' value='{$commodity['id']}' /></td>";  //状态
					echo "<td style='text-align:center;' id='commodity_number_{$commodity['id']}'>{$commodity['commodity_number']}</td>";  //商品编号
					echo "<td id='commodity_name_{$commodity['id']}'>{$commodity['commodity_name']}</td>";  //商品名称
					echo "<td style='text-align:center;' id='dan_wei_{$commodity['id']}'>{$commodity['dan_wei']}</td>";  //单位
					echo "<td id='brand_{$commodity['id']}'>{$commodity['brand']}</td>";  //品牌
					echo "<td style='text-align:right;' id='commodity_serial_number_{$commodity['id']}'>{$commodity['commodity_serial_number']}</td>";  //货号
					echo "<td id='commodity_color_{$commodity['id']}'>{$commodity['commodity_color']}</td>";  //颜色
					echo "<td style='text-align:right;' id='commodity_size_{$commodity['id']}'>{$commodity['commodity_size']}</td>";  //尺码
					echo "<td style='text-align:right;' id='tag_price_{$commodity['id']}'>{$commodity['tag_price']}</td>";  //吊牌价
// 					echo "<td style='text-align:right;'>{$commodity['inventory_number']}</td>";  //库存
					echo "</tr>";
				}
			}else{
				echo "<tr>";
				echo "<td colspan='10' align='center'>没有找到此商品！</td>";
				echo "</tr>";
			}
		}
		
		/*
		 * @abstract add_order 执行添加订单
		 * @access public
		 * */
		public function add_order(){
// 			echo "<pre>";
// 			print_r($_POST);
// 			echo "</pre>";
// 			die();
			$this->load->model("main/add_storage_order_model");
			$this->load->library("form_validation");
			//防空验证
			$this->form_validation->set_rules("purchase_price","商品单价","required");
			$this->form_validation->set_rules("num","商品数量","required");
			//设置错误信息
			$this->form_validation->set_message("required","%s不能为空！");
			if($this->form_validation->run()){
				//获取入库单信息
				$storage_order_data = array(
					"purchase_date" => $this->input->post("purchase_date"),  //销售日期
					"purchase_order_number" => $this->input->post("purchase_order_number"),  //入库单号
					"warehouse_id" => $this->input->post("warehouse_id"),  //入货仓库ID号
					"supplier_name" => $this->input->post("supplier_name"),  //供应商
					"commodity_num" => $this->input->post("commodity_num"),  //合计整单商品数量
					"total_price" => $this->input->post("total_price"),  //合计整单金额
					"settlement_status" => 0,  //结算状态
					"remark" => $this->input->post("remark")  //备注
				);
				//添加入库单信息
				if($purchase_bill_id = $this->add_storage_order_model->add_storage_order($storage_order_data)){
					//入库单详细信息
					$storage_order_detailed_data = array(
						"purchase_bill_id" => $purchase_bill_id,  //进货单ID号
						"commodity_id" => $this->input->post("commodity_id"),  //商品ID号
						"goods_num" => $this->input->post("num"),  //商品数量
						"unit_price" => $this->input->post("purchase_price")  //商品单价
					);
					//添加入库单详细信息
					if($this->add_storage_order_model->add_storage_order_detailed($storage_order_detailed_data)){
						$success_data = array(
							"content" => "入库单添加成功！",
							"url" => site_url("main/add_storage_order"),
							"time" => 3
						);
						$this->load->view("prompt/success",$success_data);
					}else{
						$error_data = array(
							"content" => "添加商品详细信息时出错！",
							"url" => site_url("main/add_storage_order"),
							"time" => 3
						);
						$this->load->view("prompt/error",$error_data);
					}
				}else{
					$error_data = array(
						"content" => "添加入库单信息时出错！",
						"url" => site_url("main/add_storage_order"),
						"time" => 3
					);
					$this->load->view("prompt/error",$error_data);
				}
			}else{
				$error_data = array(
					"content" => validation_errors(),
					"url" => site_url("main/add_storage_order"),
					"time" => 3
				);
				$this->load->view("prompt/error",$error_data);
			}
		}
	}
?>