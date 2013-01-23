<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_commodity_model 添加新商品
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_commodity_model extends CI_Model{
		/*
		 * @abstract add_commodity 添加商品
		 * @param $commodity_data 商品数据
		 * @return int 商品ID号
		 * @access public
		 * */
		public function add_commodity($commodity_data){
			if($this->db->insert("ms_commodity_information",$commodity_data)){
				return mysql_insert_id();
			}
			return false;
		}
		/*
		 * @abstract add_commodity_warehouse 添加商品库存
		 * @param $warehouse_commodity 入库商品数据
		 * @return bool
		 * @access public
		 * */
		public function add_commodity_warehouse($warehouse_commodity){
			return $this->db->insert("ms_stock_information",$warehouse_commodity);
		}
		/*
		 * @abstract sel_warehouse_default 查找默认存储仓库ID号
		 * @return int 默认存储仓库ID号
		 * @access public
		 * */
		public function sel_warehouse_default(){
			$sel_warehouse_str = "select * from `ms_warehouse` where `warehouse_type`='2' and `warehouse_default`='1'";
			$sel_warehouse_res = $this->db->query($sel_warehouse_str);
			if($sel_warehouse_res->num_rows() > 0){
				return $sel_warehouse_res->row()->id;
			}
			return false;
		}
		/*
		 * @abstract check_commodity 验证商品编号是否重复
		 * @param $commodity_number 商品编号
		 * @access public
		 * */
		public function check_commodity($commodity_number){
			$sel_commodity_str = "select * from `ms_commodity_information` where `commodity_number`='{$commodity_number}' limit 1";
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return false;
			}
			return true;
		}
	}
?>