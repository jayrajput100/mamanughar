<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class ProductModel extends Model
{
    protected $table          = 'product';
    protected $primaryKey     = 'product_id';
    protected $allowedFields  = ['product_name','product_desc','product_image','ip_address','date_created','date_modified','admin_note','supplier_id','product_status','category_id','sub_category_id','third_category_id','is_from_admin'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
   
    public function fetch_product($id)
    {
      $db = \Config\Database::connect();
      $sql="SELECT p.*,c.category_name,s.sub_cat_name,t.third_subcategory_name FROM pack_product as p 
            left join pack_category as c on c.category_id=p.category_id
            left join pack_sub_category as s on s.subcategory_id=p.sub_category_id
            left join pack_third_sub_category as t on t.third_subcategory_id=p.third_category_id
            WHERE p.product_id='$id' LIMIT 1 ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0])?$result[0]:'';
    }
    public function fetch_product_name($product_id)
    {
       
       $db = \Config\Database::connect();
       $sql="SELECT * from pack_product where product_id='$product_id'";
       $query=$db ->query($sql);
       $result=$query->getResult('array');
       return isset($result[0]['product_name'])?$result[0]['product_name']:'';  
      
    }
    public function fetch_images($product_id)
    {
       $db = \Config\Database::connect();
       $sql="SELECT * from pack_product_image where product_id='$product_id'";
       $query=$db ->query($sql);
       $result=$query->getResult('array');
       return $result;
    }
    public function fetch_supplier_product($supplier_id)
    {
       $db = \Config\Database::connect();
       $sql="SELECT * from pack_product where supplier_id='$supplier_id' and is_from_admin='1'";
       $query=$db ->query($sql);
       $result=$query->getResult('array');
       return $result;
    }
    public function listproduct()
    {
       $db = \Config\Database::connect();
      $sql="SELECT  p.* ,c.category_name,s.sub_cat_name,t.third_subcategory_name FROM pack_product as p 
            left join pack_category as c on c.category_id=p.category_id
            left join pack_sub_category as s on s.subcategory_id=p.sub_category_id
            left join pack_third_sub_category as t on t.third_subcategory_id=p.third_category_id
            left join pack_supplier as si on si.id=p.supplier_id
            where si.status='Verified' 
          ";
       $query=$db ->query($sql);
       $result=$query->getResult('array');
       return $result;
    }
    public function fetch_category($ary)
    {
      $data=array();
      $db = \Config\Database::connect();
      foreach ($ary as $key => $value) 
      {
        $data[$key]['category_id']=$value;
        $sql="SELECT category_name from pack_category where category_id='$value'";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        foreach ($result as $k => $v) 
        {
          $data[$key]['category_name']=$v['category_name'];
        }   
      }
      return $data;
    }
    public function fetch_sub_category($ary)
    {
      $data=array();
      $db = \Config\Database::connect();
      foreach ($ary as $key => $value) 
      {
        $data[$key]['subcategory_id']=$value;
        $sql="SELECT sub_cat_name from pack_sub_category where subcategory_id='$value'";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        foreach ($result as $k => $v) 
        {
          $data[$key]['sub_cat_name']=$v['sub_cat_name'];
        }   
      }
      return $data;
    }
    public function fetch_third_sub_category($ary)
    {
      $data=array();
      $db = \Config\Database::connect();
      if(is_array($ary) )
      {       
      foreach ($ary as $key => $value) 
      {
        $data[$key]['third_subcategory_id']=$value;
        $sql="SELECT third_subcategory_name from pack_third_sub_category where third_subcategory_id='$value'";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        foreach ($result as $k => $v) 
        {
          $data[$key]['third_subcategory_name']=$v['third_subcategory_name'];
        }   
      }
      return $data;
     }
     else
     {
      return false;
     } 
      
    } 
     public function search_step_product($search_value,$search_type)
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
      elseif ($search_type=="sub_cat") 
      {
       //$where="where sub_category_id='$search_value' and product_status='Approved'";
      /* return $this
                      ->table('pack_product a')
                      ->select()
                      ->where('sub_category_id', $search_value)
                       ->where('product_status','Approved')
                      ->paginate(10);*/
      }
      else
      {
       // $where="where third_category_id='$search_value' and product_status='Approved'";
          /*return $this
                      ->table('pack_product a')
                      ->select()
                      ->where('third_category_id', $search_value)
                      ->where('product_status','Approved')
                      ->paginate(10);*/
      }
     

    }
    public function next_step_third_supplier($search_value)
    {
       $db = \Config\Database::connect();
       return $this
                      ->table('pack_product ai')
                      ->select()
                      ->where('third_category_id',$search_value)
                      ->groupby('supplier_id')
                      ->paginate(10);
    }
     

}