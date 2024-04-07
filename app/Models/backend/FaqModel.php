<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class FaqModel extends Model
{
    protected $table          = 'pack_faq';
    protected $primaryKey     = 'faq_id';
    protected $allowedFields  = ['question','answer','category_id','subcategory_id','third_subcategory_id','description','image_path','ip_address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;

    public function fetch_category(){
    	$db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_category ";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function fetch_subcategory(){
      $db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_sub_category ";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function fetch_thirdsubcategory(){
      $db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_third_sub_category";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function fetch_supplier_details($supplier_id)
    {
      $db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_supplier where id='$supplier_id'";
      $query = $db ->query($sql);
      $result =$query->getResult('array');
      return isset($result[0])?$result[0]:''; 
    }
    public function getcategory($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM pack_category where category_id ='$id' limit 1";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
    public function getsubtcategory($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM 
                  pack_category AS C 
                  LEFT JOIN pack_sub_category AS SC ON C.category_id = SC.category_id 
                  WHERE SC.category_id ='$id'
                  ";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result)?$result:'';
    }
    public function getthirdsubtcategory($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM pack_third_sub_category WHERE subcategory_id ='$id' order by third_subcategory_name";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result)?$result:'';
    }
     public function fetch_city_name($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM pack_city WHERE city_id ='$id'";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0]['city_name'])?$result[0]['city_name']:'';
    }
     public function fetch_state_name($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM pack_state WHERE state_id ='$id'";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0]['state_name'])?$result[0]['state_name']:'';
    }
    
    public function fetch_supplier_city_name($supplier_id)
    {
        $db     = \Config\Database::connect();
        $sql    = "select c.city_name FROM pack_supplier as s  left join  pack_city as c on c.city_id=s.city_id WHERE s.id ='$supplier_id'";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0]['city_name'])?$result[0]['city_name']:''; 
    }
    public function viewthirdcategory($id)
    {   
        $db    = \Config\Database::connect();
        $sql   = "SELECT F.*,C.category_id,C.category_name,SC.subcategory_id,SC.category_id,SC.sub_cat_name,TSC.third_subcategory_id,TSC.third_subcategory_name
                  FROM pack_faq as F
                  Left JOIN pack_category as C  ON C.category_id = F.category_id
                  Left JOIN pack_sub_category AS SC  ON SC.subcategory_id = F.subcategory_id
                  Left JOIN pack_third_sub_category AS TSC  ON TSC.third_subcategory_id = F.third_subcategory_id
                  WHERE F.faq_id ='$id' limit 1
                  ";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
    public function findfaq()
    {
      $db = \Config\Database::connect();
        /*$sql="select * from  pack_supplier where id='$search_value'";
        $query=$db ->query($sql);
        //$result=$query->getResult('array');
        return $query;*/
       return $this
                      ->table('pack_faq a')
                      ->select()
                     
                      ->paginate(20);

    }
}