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
	}
?>