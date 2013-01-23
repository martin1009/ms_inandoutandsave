<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Login_model 登陆模型
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Login_model extends CI_Model{
		/*
		 * @abstract check_user_pass 验证用户名和密码
		 * @param $check_data 验证的数据
		 * @access public
		 * */
		public function check_user_pass($check_data){
			$sel_user_str = "select * from `rbac_admin_info` where `username`='{$check_data['username']}' limit 1";  //按用户名相找用户信息
			$sel_user_res = $this->db->query($sel_user_str);
			if($sel_user_res->num_rows() > 0){
				if($sel_user_res->row()->password == $check_data['password']){
					return $sel_user_res->row();
				}
				return false;
			}
			return false;
		}
	}
?>