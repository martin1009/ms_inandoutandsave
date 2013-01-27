<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_transfer_information_model 查看所有调库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_transfer_information_model extends CI_Model{
		/*
		 * @abstract sel_all_transfer_num 查找所有调库单总条数
		 * @return int
		 * @access public
		 * */
		public function sel_all_transfer_num(){
			return $this->db->query("select * from `ms_transfer_bill`")->num_rows();
		}
		/*
		 * @abstract sel_all_transfer 查找所有调库单
		 * @param $page_data 分页数据
		 * @return array
		 * @access public
		 * */
		public function sel_all_transfer($page_data){
			$sel_transfer_str = "select * from `ms_transfer_bill` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_transfer_res = $this->db->query($sel_transfer_str);
			if($sel_transfer_res->num_rows() > 0){
				return $sel_transfer_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_warehouse 查找所有仓库
		 * @return array
		 * @access public
		 * */
		public function sel_all_warehouse(){
			$sel_warehouse_str = "select * from `ms_warehouse`";
			$sel_warehouse_res = $this->db->query($sel_warehouse_str);
			if($sel_warehouse_res->num_rows() > 0){
				$warehouse_res = array();
				foreach($sel_warehouse_res->result_array() as $warehouse){
					$warehouse_res[$warehouse['id']] = $warehouse['warehouse_name'];
				}
				return $warehouse_res;
			}
			return false;
		}
	}
?>