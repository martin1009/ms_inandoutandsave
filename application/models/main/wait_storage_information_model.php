<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Wait_storage_information_model 未结算入库单列表
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Wait_storage_information_model extends MY_Controller{
		/*
		 * @abstract sel_all_wait_storage 查找所有未结算入库单
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_wait_storage($page_data){
			$sel_wait_storage_str = "select `ms_new_purchase_bill`.*,`ms_warehouse`.`warehouse_name` from `ms_new_purchase_bill`,`ms_warehouse` where `ms_new_purchase_bill`.`warehouse_id`=`ms_warehouse`.`id` and `ms_new_purchase_bill`.`settlement_status` = 0 order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_wait_storage_res = $this->db->query($sel_wait_storage_str);
			if($sel_wait_storage_res->num_rows() > 0){
				return $sel_wait_storage_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_wait_storage_num 查找所有未结算入库单总条数
		 * @access public
		 * */
		public function sel_all_wait_storage_num(){
			$sel_wait_storage_str = "select * from `ms_new_purchase_bill` where `settlement_status`=0";
			return $this->db->query($sel_wait_storage_str)->num_rows();
		}
		/*
		 * @abstract sel_detail_purchase 查找入库单详细
		 * @param $storage_order_id 入库单ID号
		 * @return array 入库单详细信息
		 * @access public
		 * */
		public function sel_detail_purchase($storage_order_id){
			$sel_detail_purchase_str = "select `ms_detail_purchase_bill`.*,`ms_new_purchase_bill`.`warehouse_id` from `ms_detail_purchase_bill`,`ms_new_purchase_bill` where `ms_new_purchase_bill`.`id`=`ms_detail_purchase_bill`.`purchase_bill_id` and `ms_detail_purchase_bill`.`purchase_bill_id`={$storage_order_id}";
			$sel_detail_purchase_res = $this->db->query($sel_detail_purchase_str);
			if($sel_detail_purchase_res->num_rows() > 0){
				return $sel_detail_purchase_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract add_stock_information 添加入商品库存信息中
		 * @param $detail_purchase_res 商品数组
		 * @return bool 
		 * @access public
		 * */
		public function add_stock_information($detail_purchase_res){
			//商品入库
			foreach($detail_purchase_res as $detail_purchase){
				$execute_stock = "CALL storage_commodity({$detail_purchase['commodity_id']},{$detail_purchase['warehouse_id']},{$detail_purchase['goods_num']})";
				$this->db->query($execute_stock);
			}
			//更改入库单状态
			$update_purchase_bill = "update `ms_new_purchase_bill` set `settlement_status`=1 where `id`={$detail_purchase['purchase_bill_id']}";
			if($this->db->query($update_purchase_bill)){
				return true;
			}
			return false;
		}
	}
?>