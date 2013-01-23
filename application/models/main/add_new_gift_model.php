<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_gift_model 添加新仓储柜
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_gift_model extends CI_Model{
		/*
		 * @abstract add_gift 添加新礼品
		 * @param $gift_data 礼品数据
		 * @access public
		 * */
		public function add_gift($gift_data){
			return $this->db->insert("ms_gift_info",$gift_data);
		}
	}
?>