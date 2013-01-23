<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_commodity_information_model 查看所有商品信息
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_commodity_information_model extends MY_Controller{
		/*
		 * @abstract sel_all_commodity 查找所有商品
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_commodity($page_data){
			$sel_commodity_str = "select * from `ms_commodity_information` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		
		/*
		 * @abstract sel_all_commodity_num 所有商品总条数
		 * @access public
		 * */
		public function sel_all_commodity_num(){
			return $this->db->query("select * from `ms_commodity_information`")->num_rows();
		}
		
		/*
		 * @abstract sel_commodity 查找指定商品信息
		 * @param $commodity_id 商品ID
		 * @access public
		 * */
		public function sel_commodity($commodity_id){
			$sel_commodity_str = "select * from `ms_commodity_information` where `id`=".$commodity_id;
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->row();
			}
			return false;
		}
		
		/*
		 * @abstract edit_commodity 执行编辑商品信息
		 * @param $commodity_data 商品数据
		 * @access public
		 * */
		public function edit_commodity($commodity_data,$commodity_id){
			$this->db->where("id",$commodity_id);
			return $this->db->update("ms_commodity_information",$commodity_data);
		}
		/*
		 * @abstract del_commodity 删除指定商品信息
		 * @param $commodity_id 商品ID号
		 * @access public
		 * */
		public function del_commodity($commodity_id){
			$del_commodity_str = "delete from `ms_commodity_information` where `id`=".$commodity_id." limit 1";
			return $this->db->query($del_commodity_str);
		}
	}
?>