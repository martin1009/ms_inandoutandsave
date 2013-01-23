<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_warehouse_information_model 查看所有仓库
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_warehouse_information_model extends CI_Model{
		/*
		 * @abstract sel_all_warehouse 查找所有仓库
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_warehouse($page_data){
			$sel_commodity_str = "select * from `ms_warehouse` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_commodity_res = $this->db->query($sel_commodity_str);
			if($sel_commodity_res->num_rows() > 0){
				return $sel_commodity_res->result_array();
			}
			return false;
		}
		/*
		 * @abstract sel_all_warehouse_num 所有仓库总条数
		 * @access public
		 * */
		public function sel_all_warehouse_num(){
			return $this->db->query("select * from `ms_warehouse`")->num_rows();
		}
		/*
		 * @abstract sel_warehouse 查找指定仓库信息
		 * @param $warehouse_id 指定仓库的ID号
		 * @access public
		 * */
		public function sel_warehouse($warehouse_id){
			$sel_warehouse_str = "select * from `ms_warehouse` where `id`=".$warehouse_id." limit 1";
			$sel_warehouse_res = $this->db->query($sel_warehouse_str);
			if($sel_warehouse_res->num_rows() > 0){
				return $sel_warehouse_res->row();
			}
			return false;
		}
		/*
		 * @abstract edit_warehouse 执行修改仓库信息
		 * @param $warehouse_data 更新的仓库数据
		 * @param $warehouse_id 更新的仓库ID号
		 * @access public
		 * */
		public function edit_warehouse($warehouse_data,$warehouse_id){
			$this->db->where("id",$warehouse_id);
			return $this->db->update("ms_warehouse",$warehouse_data);
		}
		/*
		 * @abstract del_warehouse 删除指定仓库
		 * @param $warehouse_id 删除的仓库ID号
		 * @access public
		 * */
		public function del_warehouse($warehouse_id){
			$del_warehouse_str = "delete from `ms_warehouse` where `id`=".$warehouse_id;
			return $this->db->query($del_warehouse_str);
		}
	}
?>