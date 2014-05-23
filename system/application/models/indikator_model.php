
		<?
class indikator_model extends Model{
function indikator_model(){
parent::Model();
$this->load->database();
}
var $table='indikator';

function get_all_data($start,$limit,$q,$s){
	 $this->db->select('*');
        $this->db->from($this->table);
		$this->db->join('kategori_neraca','indikator.Id_Jenis=kategori_neraca.id_kategori_neraca','left');
		if($s!=0){
		$this->db->or_like('Id_Jenis',$q);
$this->db->or_like('Dari',$q);
$this->db->or_like('Sampai',$q);
$this->db->or_like('Warna',$q);

        }
        $this->db->limit($limit, $start);
		return $this->db->get();
	

}


function count_all(){
return $this->db->count_all($this->table);
}
 function getData($id){
return $this->db->get_where($this->table, array('Id_indikator'=>$id));
}
function delete_data($id){

   return $this->db->delete($this->table, array('Id_indikator' => $id)); 
}
function update_data($data,$id){
  $this->db->where('Id_indikator', $id);
  $this->db->update($this->table, $data);
  return TRUE;

}
function add_data($data){
return $this->db->insert($this->table,$data);

}

}		