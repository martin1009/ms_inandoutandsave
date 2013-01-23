<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_employee_information 所有员工信息
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_employee_information_model extends CI_Model{
		/*
		 * @abstract sel_all_commodity 查找所有员工
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_commodity($page_data){
			$sel_commodity_str = "select * from `ms_employee_info` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_commodity_num 所有员工总条数
		 * @access public
		 * */
		public function sel_all_commodity_num(){
			return $this->db->query("select * from `ms_employee_info`")->num_rows();
		}
		/*
		 * @abstract sel_employee 查找指定员工
		 * @param $commodity_id 员工ID号
		 * @access public
		 * */
		public function sel_employee($employee_id){
			$sel_employee_str = "select * from `ms_employee_info` where `id`={$employee_id} limit 1";
			$sel_employee_res = $this->db->query($sel_employee_str);
			if($sel_employee_res->num_rows() > 0){
				return $sel_employee_res->row();
			}
			return false;
		}
		/*
		 * @abstract edit_employee 执行编辑员工信息
		 * @param $commodity_data 员工信息
		 * @access public
		 * */
		public function edit_employee($commodity_data,$commodity_id){
			$this->db->where("id",$commodity_id);
			return $this->db->update("ms_employee_info",$commodity_data);
		}
		/*
		 * @abstract del_employee 执行删除员工信息
		 * @param $commodity_id 员工ID号
		 * @access public
		 * */
		public function del_employee($commodity_id){
			$del_employee_str = "delete from `ms_employee_info` where `id`=".$commodity_id." limit 1";
			return $this->db->query($del_employee_str);
		}
	}
?>