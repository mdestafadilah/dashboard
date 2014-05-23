
		<?
class kategori_model extends Model{
function kategori_model(){
parent::Model();
$this->load->database();
}
var $table='kategori';

function get_all_data($start,$limit,$q,$s){
	 $this->db->select('*');
        $this->db->from($this->table);
		
		if($s!=0){
		$this->db->or_like('nama_kategori',$q);
$this->db->or_like('jenis_kategori',$q);

        }
        $this->db->limit($limit, $start);
		return $this->db->get();
	

}


function count_all(){
return $this->db->count_all($this->table);
}
 function getData($id){
return $this->db->get_where($this->table, array('id_kategori'=>$id));
}
function delete_data($id){

   return $this->db->delete($this->table, array('id_kategori' => $id)); 
}
function update_data($data,$id){
  $this->db->where('id_kategori', $id);
  $this->db->update($this->table, $data);
  return TRUE;

}
function add_data($data){
return $this->db->insert($this->table,$data);

}

}		