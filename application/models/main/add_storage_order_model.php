<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_storage_order_model 新增入库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_storage_order_model extends CI_Model{
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
		 * @abstract sel_commodity_fuzzy_number 按商品编号模糊查询
		 * @param $commodity_number 商品编号
		 * @return array 商品数组
		 * @access public
		 * */
		public function sel_commodity_fuzzy_number($commodity_number){
			$sel_commodity_str = "select * from `ms_commodity_information` where `commodity_number` like '%{$commodity_number}%' order by `id` desc";
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_commodity 查找所有商品及库存
		 * @return array 商品及库存数组
		 * @access public
		 * */
		public function sel_all_commodity(){
			$sel_commodity_str = "select * from `ms_commodity_information` order by `id` desc";
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract add_storage_order 添加入库单基本信息
		 * @param $storage_order_data 基本信息数据
		 * @access public
		 * */
		public function add_storage_order($storage_order_data){
			if($this->db->insert("ms_new_purchase_bill",$storage_order_data)){
				return mysql_insert_id();
			}
			return false;
		}
		/*
		 * @abstract add_storage_order_detailed 添加入库单详细信息
		 * @param $storage_order_detailed_data 入库详细数据
		 * @access public
		 * */
		public function add_storage_order_detailed($storage_order_detailed_data){
			$add_storage_order_detailed_str = "insert into `ms_detail_purchase_bill` (`id`,`purchase_bill_id`,`commodity_id`,`goods_num`,`unit_price`) values ";
			for($i=0;$i<count($storage_order_detailed_data['commodity_id']);$i++){
				if($i == 0){
					$add_storage_order_detailed_str .= "(NULL,{$storage_order_detailed_data['purchase_bill_id']},{$storage_order_detailed_data['commodity_id'][$i]},{$storage_order_detailed_data['goods_num'][$i]},{$storage_order_detailed_data['unit_price'][$i]})";
				}else{
					$add_storage_order_detailed_str .= ",(NULL,{$storage_order_detailed_data['purchase_bill_id']},{$storage_order_detailed_data['commodity_id'][$i]},{$storage_order_detailed_data['goods_num'][$i]},{$storage_order_detailed_data['unit_price'][$i]})";
				}
			}
			return $this->db->query($add_storage_order_detailed_str);
		}
	}
?>