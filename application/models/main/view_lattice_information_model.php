<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_lattice_information_model 查看所有仓储柜格子
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_lattice_information_model extends CI_Model{
		/*
		 * @abstract sel_all_lattice 查找所有格子
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_lattice($page_data){
			$sel_lattice_str = "select * from `ms_cabinet_lattice` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_lattice_res = $this->db->query($sel_lattice_str);
			if($sel_lattice_res->num_rows() > 0){
				//将仓储柜ID号换成仓储柜名称
				$lattice_res = $sel_lattice_res->result_array();
				foreach($lattice_res as $key=>$lattice){
					$sel_cabinet_str = "select * from `ms_cabinet` where `id`=".$lattice['cabinet_id']." limit 1";
					$lattice_res[$key]['cabinet_id'] = $this->db->query($sel_cabinet_str)->row()->cabinet_name;
				}
				return $lattice_res;
			}
			return false;
		}
		/*
		 * @abstract sel_all_lattice_num 格子总条数
		 * @access public
		 * */
		public function sel_all_lattice_num(){
			return $this->db->query("select * from `ms_cabinet_lattice`")->num_rows();
		}
		/*
		 * @abstract sel_lattice 查找指定格子信息
		 * @param $lattice_id 格子ID号
		 * @access public
		 * */
		public function sel_lattice($lattice_id){
			$sel_lattice_str = "select * from `ms_cabinet_lattice` where `id`=".$lattice_id." limit 1";
			$sel_lattice_res = $this->db->query($sel_lattice_str);
			if($sel_lattice_res->num_rows() > 0){
				return $sel_lattice_res->row();
			}
			return false;
		}
		/*
		 * @abstract edit_lattice 编辑指定格子
		 * @param $lattice_data 更新的格子内容
		 * @access public
		 * */
		public function edit_lattice($lattice_data,$lattice_id){
			$this->db->where("id",$lattice_id);
			return $this->db->update("ms_cabinet_lattice",$lattice_data);
		}
		/*
		 * @abstract del_lattice 删除指定格子
		 * @param $lattice_id 格子ID号
		 * @access public
		 * */
		public function del_lattice($lattice_id){
			$del_lattice_str = "delete from `ms_cabinet_lattice` where `id`=".$lattice_id." limit 1";
			return $this->db->query($del_lattice_str);
		}
	}
?>