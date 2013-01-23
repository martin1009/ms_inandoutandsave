<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_employee_model 添加新员工
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_employee_model extends CI_Model{
		/*
		 * @abstract add_employee 执行添加员工
		 * @param $employee_data
		 * @access public
		 * */
		public function add_employee($employee_data){
			if($this->db->insert("ms_employee_info",$employee_data)){
				return true;
			}
			return false;
		}
	}
?>