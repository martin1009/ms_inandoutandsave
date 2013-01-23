<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract Add_new_lattice_model 添加新仓储柜格子
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class Add_new_lattice_model extends CI_Model{
		/*
		 * @abstract sel_cabinet 查找所有仓储柜
		 * @access public
		 * */
		public function sel_cabinet(){
			$sel_cabinet_str = "select * from `ms_cabinet`";
			$sel_cabinet_res = $this->db->query($sel_cabinet_str);
			if($sel_cabinet_res->num_rows() > 0){
				return $sel_cabinet_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract add_lattice 添加格子
		 * @param $lattice_data 格子数据
		 * @access public
		 * */
		public function add_lattice($lattice_data){
			return $this->db->insert("ms_cabinet_lattice",$lattice_data);
		}
	}
?>