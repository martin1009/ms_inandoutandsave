<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * @abstract View_cabinet_information_model 查看所有仓储柜
	 * @access public
	 * @author 娱扬 hai191273@163.com
	 * @version 美思服装进销存
	 * */
	class View_cabinet_information_model extends CI_Model{
		/*
		 * @abstract sel_all_cabinet 查找所有仓储柜
		 * @param $page_data 分页数据
		 * @access public
		 * */
		public function sel_all_cabinet($page_data){
			$sel_cabinet_str = "select * from `ms_cabinet` order by `id` desc limit ".(($page_data['page']-1)*$page_data['page_row']).",".$page_data['page_row'];
			$sel_cabinet_res = $this->db->query($sel_cabinet_str);
			if($sel_cabinet_res->num_rows() > 0){
				//将warehouse_id 所属仓库ID号改成对应仓库名称
				$sel_cabinet_res = $sel_cabinet_res->result_array();
				foreach($sel_cabinet_res as $key=>$sel_cabinet){
					$sel_warehouse_str = "select * from `ms_warehouse` where `id`=".$sel_cabinet['warehouse_id']." limit 1";
					$sel_cabinet_res[$key]['warehouse_id'] = $this->db->query($sel_warehouse_str)->row()->warehouse_name;
				}
				return $sel_cabinet_res;
			}
			return false;
		}
		/*
		 * @abstract sel_all_cabinet_num 所有仓储柜总条数
		 * @access public
		 * */
		public function sel_all_cabinet_num(){
			return $this->db->query("select * from `ms_cabinet`")->num_rows();
		}
		/*
		 * @abstract sel_cabinet 查找指定仓储柜
		 * @param $cabinet_id 仓储柜ID号
		 * @access public
		 * */
		public function sel_cabinet($cabinet_id){
			$sel_cabinet_str = "select * from `ms_cabinet` where `id`=".$cabinet_id." limit 1";
			$sel_cabinet_res = $this->db->query($sel_cabinet_str);
			if($sel_cabinet_res->num_rows() > 0){
				return $sel_cabinet_res->row();
			}
			return false;
		}
		/*
		 * @abstract edit_cabinet 执行编辑仓储柜
		 * @param $cabinet_data 更新数据
		 * @param $$cabinet_id 更新仓储柜的ID号
		 * @access public
		 * */
		public function edit_cabinet($cabinet_data,$cabinet_id){
			$this->db->where("id",$cabinet_id);
			return $this->db->update("ms_cabinet",$cabinet_data);
		}
		/*
		 * @abstract del_cabinet 删除指定仓储柜
		 * @param $cabinet_id 仓储柜ID号
		 * @access public
		 * */
		public function del_cabinet($cabinet_id){
			$del_cabinet_str = "delete from `ms_cabinet` where `id`=".$cabinet_id." limit 1";
			return $this->db->query($del_cabinet_str);
		}
	}
?>