<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_warehouse_model 添加新仓库
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_warehouse_model extends MY_Controller{
		/*
		 * @abstract check_warehouse 检查此类型仓库是否已经存在默认
		 * @param $warehouse_data 仓库数据
		 * @return bool
		 * @access public
		 * */
		public function check_warehouse($warehouse_data){
			if($warehouse_data['warehouse_default'] == "1"){
				$check_str = "select * from `ms_warehouse` where `warehouse_type`={$warehouse_data['warehouse_type']} and `warehouse_default`={$warehouse_data['warehouse_default']}";
				if($this->db->query($check_str)->num_rows() > 0){
					return false;
				}
				return true;
			}else{
				return true;
			}
		}
		/*
		 * @abstract add_warehouse 添加仓库
		 * @param $warehouse_data 仓库数据
		 * @return bool
		 * @access public
		 * */
		public function add_warehouse($warehouse_data){
			if($this->db->insert("ms_warehouse",$warehouse_data)){
				return true;
			}
			return false;
		}
	}
?>