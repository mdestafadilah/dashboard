<?php
	class user_model extends Model{

	function user_model(){
		parent::Model();
		$this->load->database();
	}

	// Definisi tabel di db
	var $table='user';

	function get_all_data($start,$limit,$q,$s){
	 
		$this->db->select('*');
        $this->db->from($this->table);
		
		if($s!=0){
			$this->db->or_like('nama',$q);
			$this->db->or_like('username',$q);
			$this->db->or_like('password',$q);
			$this->db->or_like('level',$q);
		}
		return $this->db->get();
	}
/*
function get_all_data($start,$limit,$q,$s){
	 $this->db->select('*');
	 $this->db->join('unitkerja','user.idunitkerja=unitkerja.idunitkerja','left');
        $this->db->from($this->table);
		
		if($s!=0){
		$this->db->or_like('user.username',$q);
$this->db->or_like('user.password',$q);
$this->db->or_like('user.level',$q);
$this->db->or_like('user.nama',$q);

        }
        $this->db->limit($limit, $start);
		return $this->db->get();
*/
function count_all(){
return $this->db->count_all($this->table);
}
 function getData($id){
return $this->db->get_where($this->table, array('id_user'=>$id));
}
function delete_data($id){

   return $this->db->delete($this->table, array('id_user' => $id)); 
}
function update_data($data,$id){
  $this->db->where('id_user', $id);
  $this->db->update($this->table, $data);
  return TRUE;

}
function add_data($data){
return $this->db->insert($this->table,$data);

}

}		