<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_cabinet_model 添加新仓储柜
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_cabinet_model extends MY_Controller{
		/*
		 * @abstract sel_all_warehouse 查找所有仓库
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_warehouse(){
			$sel_commodity_str = "select * from `ms_warehouse`";
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract add_cabinet 添加仓储柜
		 * @param $cabinet_data 仓储柜数据
		 * @access public
		 * */
		public function add_cabinet($cabinet_data){
			return $this->db->insert("ms_cabinet",$cabinet_data);
		}
	}
?>