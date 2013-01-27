<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_transfer_model 新增调库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_transfer_model extends CI_Model{
		/*
		 * @abstract sel_warehouse 查找所有仓库
		 * @return array 仓库数组
		 * @access public
		 * */
		public function sel_warehouse(){
			$sel_warehouse_str = "select * from `ms_warehouse`";
			$sel_warehouse_res = $this->db->query($sel_warehouse_str);
			if($sel_warehouse_res->num_rows() > 0){
				return $sel_warehouse_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_commodity 查找所有商品及库存
		 * @param $warehouse_data 仓库数据
		 * @return array 商品及库存数组
		 * @access public
		 * */
		public function sel_all_commodity($warehouse_data){
			$sel_commodity_str = "select `ms_stock_information`.`inventory_number`,`ms_commodity_information`.* from `ms_stock_information`,`ms_commodity_information` where `ms_stock_information`.`commodity_id`=`ms_commodity_information`.`id` and `ms_stock_information`.`warehouse_id`={$warehouse_data['out_warehouse_id']} order by `id` desc";
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_out_commodity_name 查找出货仓库名称
		 * @param $commodity_data 仓库数据
		 * @return string 出货仓库名称
		 * @access public
		 * */
		public function sel_out_warehouse_name($warehouse_data){
			$sel_out_warehouse_name_str = "select * from `ms_warehouse` where `id`={$warehouse_data['out_warehouse_id']} limit 1";
			$sel_out_warehouse_name_res = $this->db->query($sel_out_warehouse_name_str);
			if($sel_out_warehouse_name_res->num_rows() > 0){
				return $sel_out_warehouse_name_res->row()->warehouse_name;
			}
			return false;
		}
		/*
		 * @abstract sel_commodity_fuzzy_number 按商品编号模糊查找商品
		 * @param $commodity_number 商品编号
		 * @param $commodity_data 仓库数据
		 * @return array 商品及库存数组
		 * @access public
		 * */
		public function sel_commodity_fuzzy_number($commodity_number,$warehouse_data){
			$sel_commodity_str = "select `ms_stock_information`.`inventory_number`,`ms_commodity_information`.* from `ms_stock_information`,`ms_commodity_information` where `ms_stock_information`.`commodity_id`=`ms_commodity_information`.`id` and `ms_stock_information`.`warehouse_id`={$warehouse_data['out_warehouse_id']} and `ms_commodity_information`.`commodity_number` like '%{$commodity_number}%' order by `id` desc";
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract add_transfer_order 添加调库单基本信息
		 * @param $transfer_order_data 调库单基本数据
		 * @return int 调库单ID号
		 * @access public
		 * */
		public function add_transfer_order($transfer_order_data){
			if($this->db->insert("ms_transfer_bill",$transfer_order_data)){
				return mysql_insert_id();
			}
			return false;
		}
		/*
		 * @abstract add_transfer_detail_order 添加调库单详细信息
		 * @param $transfer_detail_order_data 调库单详细数据
		 * @return bool
		 * @access public
		 * */
		public function add_transfer_detail_order($transfer_detail_order_data){
			$transfer_detail_order_str = "insert into `ms_detail_transfer_bill` (`id`,`transfer_bill_id`,`commodity_id`,`commodity_num`) values ";
			for($i=0;$i<count($transfer_detail_order_str["commodity_id_res"]);$i++){
				if($i==0){
					$transfer_detail_order_str .= "(NULL,'{$transfer_detail_order_data['transfer_bill_id']}','{$transfer_detail_order_data['commodity_id_res'][$i]}','{$transfer_detail_order_data['num_res'][$i]}')";
				}else{
					$transfer_detail_order_str .= ",(NULL,'{$transfer_detail_order_data['transfer_bill_id']}','{$transfer_detail_order_data['commodity_id_res'][$i]}','{$transfer_detail_order_data['num_res'][$i]}')";
				}
			}
			if($this->db->query($transfer_detail_order_str)){
				return true;
			}
			return false;
		}
		/*
		 * @abstract update_stock 更新库存数量
		 * @param $stock_data 更新数据
		 * @return bool
		 * @access public
		 * */
		public function update_stock($stock_data){
			$b = true;
			for($i=0;$i<count($stock_data['commodity_id_res']);$i++){
				$call_stock_str = "CALL transfer_order({$stock_data['out_warehouse_id']},{$stock_data['in_warehouse_id']},{$stock_data['commodity_id_res'][$i]},{$stock_data['num_res'][$i]})";
				if(!$this->db->query($call_stock_str)){
					$b = false;
					break;
				}
			}
			return $b;
		}
	}
?>