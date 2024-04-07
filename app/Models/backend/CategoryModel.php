<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class CategoryModel extends Model
{
    protected $table          = 'category';
    protected $primaryKey     = 'category_id';
    protected $allowedFields  = ['category_name','category_desc','category_image_path','ip_address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    public function fetch_category($id){
    	$db = \Config\Database::connect();
      $sql="SELECT * FROM pack_category WHERE category_id='$id' LIMIT 1 ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0])?$result[0]:'';
    }
    public function fetch_category_name($id){
      $db = \Config\Database::connect();
      $sql="SELECT category_name FROM pack_category WHERE category_id='$id' LIMIT 1 ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0]['category_name'])?$result[0]['category_name']:'';
    }
}