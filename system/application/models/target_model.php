
		<?
class target_model extends Model{
function target_model(){
parent::Model();
$this->load->database();
}
var $table='target';

function get_all_data($start,$limit,$q,$s){
	 $this->db->select('*');
        $this->db->from($this->table);
				$this->db->join('kategori_neraca','target.Id_Jenis=kategori_neraca.id_kategori_neraca','left');
		if($s!=0){
		$this->db->or_like('Id_Jenis',$q);
$this->db->or_like('Value_Target',$q);

        }
        $this->db->limit($limit, $start);
		return $this->db->get();
	

}


function count_all(){
return $this->db->count_all($this->table);
}
 function getData($id){
return $this->db->get_where($this->table, array('Id_target'=>$id));
}
function delete_data($id){

   return $this->db->delete($this->table, array('Id_target' => $id)); 
}
function update_data($data,$id){
  $this->db->where('Id_target', $id);
  $this->db->update($this->table, $data);
  return TRUE;

}
function add_data($data){
return $this->db->insert($this->table,$data);

}

}		