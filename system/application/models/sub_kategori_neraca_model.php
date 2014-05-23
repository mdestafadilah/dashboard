
		<?
class sub_kategori_neraca_model extends Model{
function sub_kategori_neraca_model(){
parent::Model();
$this->load->database();
}
var $table='sub_kategori_neraca';

function get_all_data($start,$limit,$q,$s){
	 $this->db->select('*');
        $this->db->from($this->table);
		$this->db->join('kategori_neraca','sub_kategori_neraca.id_kategori_neraca=kategori_neraca.id_kategori_neraca','left');
		
		if($s!=0){
		$this->db->or_like('id_kategori_neraca',$q);
$this->db->or_like('nama_sub_kategori_neraca',$q);

        }
        $this->db->limit($limit, $start);
		return $this->db->get();
	

}


function count_all(){
return $this->db->count_all($this->table);
}
 function getData($id){
return $this->db->get_where($this->table, array('id_sub_kategori_neraca'=>$id));
}
function delete_data($id){

   return $this->db->delete($this->table, array('id_sub_kategori_neraca' => $id)); 
}
function update_data($data,$id){
  $this->db->where('id_sub_kategori_neraca', $id);
  $this->db->update($this->table, $data);
  return TRUE;

}
function add_data($data){
return $this->db->insert($this->table,$data);

}

}		