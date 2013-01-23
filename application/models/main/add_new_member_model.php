<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_member_model 添加新会员
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_member_model extends CI_Model{
		/*
		 * @abstract add_member 添加新会员
		 * @param $member_data
		 * @access public
		 * */
		public function add_member($member_data){
			if($this->db->insert("ms_membership_information",$member_data)){
				return true;
			}
			return false;
		}
	}
?>