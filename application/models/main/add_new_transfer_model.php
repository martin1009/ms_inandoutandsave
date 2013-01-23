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
	}
?>