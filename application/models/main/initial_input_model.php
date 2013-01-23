<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Initial_input_model 期初库存录入
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Initial_input_model extends CI_Model{
		/*
		 * @abstract sel_warehouse 查找所有仓库
		 * @access public
		 * */
		public function sel_warehouse(){
			$sel_warehouse_str = "select * from `ms_warehouse` order by `id` desc";
			$sel_warehouse_res = $this->db->query($sel_warehouse_str);
			if($sel_warehouse_res->num_rows() > 0){
				return $sel_warehouse_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_commodity_id 根据商品编号查找出商品ID号
		 * @param $commodity_number 商品编号
		 * @access public
		 * */
		public function sel_commodity_id($commodity_number){
			$sel_commodity_id_str = "select * from `ms_commodity_information` where `commodity_number`='{$commodity_number}' limit 1";
			$sel_commodity_id_res = $this->db->query($sel_commodity_id_str);
			if($sel_commodity_id_res->num_rows() > 0){
				return $sel_commodity_id_res->row()->id;
			}
			return false;
		}
		/*
		 * @abstract check_commodity 验证指定仓库是否已经存在指定商品
		 * @param $initial_data 入库数据
		 * @access public
		 * */
		public function check_commodity($initial_data){
			$check_str = "select * from `ms_stock_information` where `commodity_id`={$initial_data['commodity_id']} and `warehouse_id`={$initial_data['warehouse_id']} limit 1";
			if($this->db->query($check_str)->num_rows() > 0){
				return false;
			}
			return true;
		}
		/*
		 * @abstract input_commodity 期初库存录入
		 * @param $initial_data 入库数据
		 * @access public
		 * */
		public function input_commodity($initial_data){
			return $this->db->insert("ms_stock_information",$initial_data);
		}
	}
?>