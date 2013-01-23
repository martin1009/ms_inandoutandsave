<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_gift_information_model 查看礼品资料
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_gift_information_model extends CI_Model{
		/*
		 * @abstract sel_all_gift 查找所有商品
		 * @param $page_data
		 * @access public
		 * */
		public function sel_all_gift($page_data){
			$sel_gift_str = "select * from `ms_gift_info` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_gift_res = $this->db->query($sel_gift_str);
			if($sel_gift_res->num_rows() > 0){
				return $sel_gift_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_gift_num 查找所有礼品总条数
		 * @access public
		 * */
		public function sel_all_gift_num(){
			return $this->db->query("select * from `ms_gift_info`")->num_rows();
		}
		/*
		 * @abstract sel_gift 查找指定礼品信息
		 * @param $gift_id
		 * @access public
		 * */
		public function sel_gift($gift_id){
			$sel_gift_str = "select * from `ms_gift_info` where `id`={$gift_id} limit 1";
			$sel_gift_res = $this->db->query($sel_gift_str);
			if($sel_gift_res->num_rows() > 0){
				return $sel_gift_res->row();
			}
			return false;
		}
		/*
		 * @abstract edit_gift 执行编辑
		 * @param $gift_data 更新数据
		 * @param $gift_id 更新的ID号
		 * @access public
		 * */
		public function edit_gift($gift_data,$gift_id){
			$this->db->where("id",$gift_id);
			return $this->db->update("ms_gift_info",$gift_data);
		}
	}
?>