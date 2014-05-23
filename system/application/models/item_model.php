<?
class item_model extends Model{
function item_model(){
parent::Model();
$this->load->database();
}
var $table='item';

function get_all_data($start,$limit,$q,$s){
	 $this->db->select('*');
        $this->db->from($this->table);
		$this->db->join('kategori','kategori.id_kategori=item.id_kategori','left');
		
		if($s!=0){
		$this->db->or_like('id_kategori',$q);
$this->db->or_like('nama_item',$q);
$this->db->or_like('value',$q);

        }
        $this->db->limit($limit, $start);
		return $this->db->get();
	

}


function count_all(){
return $this->db->count_all($this->table);
}
 function getData($id){
return $this->db->get_where($this->table, array('id_item'=>$id));
}
function delete_data($id){

   return $this->db->delete($this->table, array('id_item' => $id)); 
}
function update_data($data,$id){
  $this->db->where('id_item', $id);
  $this->db->update($this->table, $data);
  return TRUE;

}
function add_data($data){
return $this->db->insert($this->table,$data);

}

}		