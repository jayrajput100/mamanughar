<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class SubcategoryModel extends Model
{
    protected $table          = 'sub_category';
    protected $primaryKey     = 'subcategory_id';
    protected $allowedFields  = ['sub_cat_name','sub_cat_desc','sub_cat_image_path','category_id','ip_address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    public function fetch_category()
    {
    	$db = \Config\Database::connect();
        $sql="SELECT * FROM pack_category ";
        $query=$db ->query($sql);
        return $query->getResult('array');
    }
    public function fetch_particular_sub_category($id)
    {   
        $db = \Config\Database::connect();
        $sql="SELECT psc.*,pc.category_name 
              FROM pack_sub_category AS psc 
              LEFT JOIN pack_category AS pc on pc.category_id = psc.category_id  
              WHERE psc.subcategory_id ='$id' LIMIT 1";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
    public function fetch_sub_cat_name($id)
    {
      $db = \Config\Database::connect();
      $sql="SELECT sub_cat_name FROM pack_sub_category WHERE subcategory_id='$id' LIMIT 1 ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0]['sub_cat_name'])?$result[0]['sub_cat_name']:'';
    }
    public function search_step_sub_cat($search_value,$search_type)
    {
      $db = \Config\Database::connect();
        /*$sql="select * from  pack_supplier where id='$search_value'";
        $query=$db ->query($sql);
        //$result=$query->getResult('array');
        return $query;*/
      
      if($search_type=="cat")
      {
       //$where="where category_id='$search_value' and product_status='Approved'";
       return $this
                      ->table('pack_sub_category ai')
                      ->select()
                      ->where('category_id',$search_value)
                      ->paginate(10);
      }
    }
    public function find_cat_id($subcategory_id)
    {
      $db = \Config\Database::connect();
      $sql="SELECT category_id FROM pack_sub_category WHERE subcategory_id='$subcategory_id' LIMIT 1 ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0]['category_id'])?$result[0]['category_id']:'';
    }
}