<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_commodity_warehouse_model 查看所有商品库存
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_commodity_warehouse_model extends CI_Model{
		/*
		 * @abstract sel_all_commodity_warehouse 查找所有商品库存信息
		 * @param $page_data 分页数据
		 * @return array 商品库存数组
		 * @access public
		 * */
		public function sel_all_commodity_warehouse($page_data){
			$sel_all_commodity_warehouse_str = "select `ms_stock_information`.*,`ms_commodity_information`.`commodity_number`,`ms_commodity_information`.`brand`,`ms_commodity_information`.`commodity_name`,`ms_warehouse`.`warehouse_name` from `ms_stock_information`,`ms_commodity_information`,`ms_warehouse` where `ms_stock_information`.`commodity_id`=`ms_commodity_information`.`id` and `ms_stock_information`.`warehouse_id`=`ms_warehouse`.`id` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_all_commodity_warehouse_res = $this->db->query($sel_all_commodity_warehouse_str);
			if($sel_all_commodity_warehouse_res->num_rows() > 0){
				return $sel_all_commodity_warehouse_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_commodity_warehouse_num 所有商品库存条数
		 * @return int 所有商品库存条数
		 * @access public
		 * */
		public function sel_all_commodity_warehouse_num(){
			$sel_all_commodity_warehouse_str = "select `ms_stock_information`.*,`ms_commodity_information`.`commodity_number`,`ms_commodity_information`.`brand`,`ms_commodity_information`.`commodity_name`,`ms_warehouse`.`warehouse_name` from `ms_stock_information`,`ms_commodity_information`,`ms_warehouse` where `ms_stock_information`.`commodity_id`=`ms_commodity_information`.`id` and `ms_stock_information`.`warehouse_id`=`ms_warehouse`.`id`";
			return $this->db->query($sel_all_commodity_warehouse_str)->num_rows();
		}
		/*
		 * @abstract sel_commodity_warehouse 查找指定商品库存信息
		 * @param $commodity_warehouse_id 商品库存ID号
		 * @access public
		 * */
		public function sel_commodity_warehouse($commodity_warehouse_id){
			$sel_commodity_warehouse_str = "select `ms_stock_information`.*,`ms_commodity_information`.`commodity_number`,`ms_commodity_information`.`brand`,`ms_commodity_information`.`commodity_name`,`ms_warehouse`.`warehouse_name` from `ms_stock_information`,`ms_commodity_information`,`ms_warehouse` where `ms_stock_information`.`id`={$commodity_warehouse_id} and `ms_stock_information`.`commodity_id`=`ms_commodity_information`.`id` and `ms_stock_information`.`warehouse_id`=`ms_warehouse`.`id`";
			return $this->db->query($sel_commodity_warehouse_str)->row();
		}
		/*
		 * @abstract edit_commodity_warehouse 修改商品库存信息
		 * @param $commodity_warehouse_data 商品数据
		 * @access public
		 * */
		public function edit_commodity_warehouse($commodity_warehouse_data){
			$this->db->where("id",$commodity_warehouse_data['id']);
			return $this->db->update("ms_stock_information",$commodity_warehouse_data);
		}
		/*
		 * @abstract del_commodity_warehouse 删除指定商品库存
		 * @param $commodity_warehouse_id 商品库存ID号
		 * @access public
		 * */
		public function del_commodity_warehouse($commodity_warehouse_id){
			$del_commodity_warehouse_str = "delete from `ms_stock_information` where `id`={$commodity_warehouse_id}";
			return $this->db->query($del_commodity_warehouse_str);
		}
	}
?>