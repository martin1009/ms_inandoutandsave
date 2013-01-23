<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Settle_accounts_information_model 查看所有已结算入库单
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_settle_accounts_information_model extends CI_Model{
		/*
		 * @abstract sel_all_settle_accounts 查找所有已结算的入库单
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_settle_accounts($page_data){
			$sel_all_settle_accounts_str = "select `ms_new_purchase_bill`.*,`ms_warehouse`.`warehouse_name` from `ms_new_purchase_bill`,`ms_warehouse` where `ms_new_purchase_bill`.`warehouse_id`=`ms_warehouse`.`id` and `ms_new_purchase_bill`.`settlement_status`=1";
			$sel_all_settle_accounts_res = $this->db->query($sel_all_settle_accounts_str);
			if($sel_all_settle_accounts_res->num_rows() > 0){
				return $sel_all_settle_accounts_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_accounts_information_num 查找所有已结算的入库单总条数
		 * @access public
		 * */
		public function sel_all_accounts_information_num(){
			$sel_all_accounts_information_num_str = "select * from `ms_new_purchase_bill` where `settlement_status`=1";
			return $this->db->query($sel_all_accounts_information_num_str)->num_rows();
		}
	}
?>