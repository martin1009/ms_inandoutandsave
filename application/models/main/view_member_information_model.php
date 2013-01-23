<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_member_information 查看所有会员
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_member_information_model extends CI_Model{
		/*
		 * @abstract sel_all_member 查找所有会员
		 * @param $page_data 分页数组
		 * @access public
		 * */
		public function sel_all_member($page_data){
			$sel_member_str = "select * from `ms_membership_information` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_member_res = $this->db->query($sel_member_str);
			if($sel_member_res->num_rows() > 0){
				return $sel_member_res->result_array();  //返回数据
			}
			return false;
		}
		/*
		 * @abstract sel_all_member_num 查找会员总条数
		 * @access public
		 * */
		public function sel_all_member_num(){
			return $this->db->query("select * from `ms_membership_information`")->num_rows();
		}
		/*
		 * @abstract sel_member 查找指定会员
		 * @param $member_id 指定会员ID号
		 * @access public
		 * */
		public function sel_member($member_id){
			$sel_member_str = "select * from `ms_membership_information` where `id`={$member_id} limit 1";
			$sel_member_res = $this->db->query($sel_member_str);
			if($sel_member_res->num_rows() > 0){
				return $sel_member_res->row();
			}
			return false;
		}
		/*
		 * @abstract edit_member 执行编辑命令
		 * @param $member_data 更新的会员数据
		 * @access public
		 * */
		public function edit_member($member_data,$member_id){
			$this->db->where("id",$member_id);
			return $this->db->update("ms_membership_information",$member_data);
		}
		/*
		 * @abstract del_member 删除指定会员
		 * @param $member_id 删除会员的ID
		 * @access public
		 * */
		public function del_member($member_id){
			$del_member_str = "delete from `ms_membership_information` where `id`=".$member_id;
			return $this->db->query($del_member_str);
		}
	}
?>