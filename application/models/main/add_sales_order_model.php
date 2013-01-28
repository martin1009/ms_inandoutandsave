<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_sales_order_model 新增销售单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_sales_order_model extends CI_Model{
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
		 * @abstract sel_vague_serial 模糊搜索卡号和人名
		 * @param $serial_number
		 * @return array
		 * @access public
		 * */
		public function sel_vague_serial($serial_number){
			$sel_vague_serial_str = "select * from `ms_membership_information` where `serial_number` like '%{$serial_number}%' or `name` like '%{$serial_number}%' limit 15";
			$sel_vague_serial_res = $this->db->query($sel_vague_serial_str);
			if($sel_vague_serial_res->num_rows() > 0){
				return $sel_vague_serial_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_vague_gift 模糊搜索礼品
		 * @param $gift_name
		 * @return array
		 * @access public
		 * */
		public function sel_vague_gift($gift_name){
			$sel_vague_gift_str = "select * from `ms_gift_info` where `name` like '%{$gift_name}%' limit 15";
			$sel_vague_gift_res = $this->db->query($sel_vague_gift_str);
			if($sel_vague_gift_res->num_rows() > 0){
				return $sel_vague_gift_res->result_array();
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
	}
?>