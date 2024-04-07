<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class Third_SubcategoryModel extends Model
{
    protected $table          = 'pack_third_sub_category';
    protected $primaryKey     = 'third_subcategory_id';
    protected $allowedFields  = ['third_subcategory_name','category_id','subcategory_id','description','image_path','ip_address'];
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
    public function getcategory($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM pack_category where category_id ='$id' limit 1";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
    public function getsubcategory($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM 
                  pack_category AS C 
                  LEFT JOIN pack_sub_category AS SC ON C.category_id = SC.category_id 
                  WHERE SC.category_id ='$id' order by sub_cat_name
                  ";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result)?$result:'';
    }
    public function getsubcategory1($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "select * FROM pack_sub_category  where category_id ='$id'";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result)?$result:'';
    }
    public function viewthirdcategory($id)
    {   
        $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM  pack_third_sub_category as TSC
                  JOIN pack_category as C  ON C.category_id = TSC.category_id
                  JOIN pack_sub_category AS SC ON SC.subcategory_id = TSC.subcategory_id
                  WHERE TSC.third_subcategory_id ='$id' limit 1
                  ";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
    public function fetch_third_sub_cat_name($id)
    {
       $db = \Config\Database::connect();
      $sql="SELECT third_subcategory_name FROM pack_third_sub_category WHERE third_subcategory_id='$id' LIMIT 1 ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0]['third_subcategory_name'])?$result[0]['third_subcategory_name']:'';

    }
    public function getthirdsubtcategory($id)
    {   
        $db     = \Config\Database::connect();
        $sql    = "SELECT * FROM pack_third_sub_category WHERE subcategory_id ='$id'";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result)?$result:'';
    }
    public function search_step_third_sub_cat($search_value,$search_type)
    {
      $db = \Config\Database::connect();
      if($search_type=="sub_cat")
      {
       //$where="where category_id='$search_value' and product_status='Approved'";
       return $this
                      ->table('pack_third_sub_category ai')
                      ->select()
                      ->where('subcategory_id',$search_value)
                      ->paginate(10);
      }
    }
}