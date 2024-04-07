<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class SupplierModel extends Model
{
    protected $table          = 'pack_supplier';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['supplier_name','company_name','contact_person','mobile','email','country_id','state_id','city_id','location','business_category','category_id','subcategory_id','third_subcategory_id','supplier_type','website','ip_address','password','supplier_description','alternate_mobile','alternate_email','pin_code','phone_no','otp','otp_datetime','supplier_image','status','is_mobile_verified','is_email_verified'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    protected $db;
    protected function hashPassword(array $data)
    {
          if (! isset($data['data']['password'])) 
          {
          return $data;
          }
          $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
          // unset($data['data']['admin_password']);
          return $data;
    }
    public function fetch_category(){
    	  $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM pack_category";
        $query = $db ->query($sql);
        return $query->getResult('array');
    }
    public function fetch_sub_category(){
    	  $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM pack_sub_category";
        $query = $db ->query($sql);
        return $query->getResult('array');
    }
    public function fetch_third_subcategory(){
      $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM pack_third_sub_category";
        $query = $db ->query($sql);
        return $query->getResult('array');
    }
    public function viewsupplier($id)
    {   
        $db    = \Config\Database::connect();
        $sql   = "select  *,C.category_name,SC.sub_cat_name,TSC.third_subcategory_name,S.category_id,S.subcategory_id,S.third_subcategory_id FROM pack_supplier as S
                  left JOIN pack_category as C  ON C.category_id = S.category_id
                  left JOIN pack_sub_category AS SC  ON SC.subcategory_id = S.subcategory_id
                  left JOIN pack_third_sub_category AS TSC  ON TSC.third_subcategory_id = S.third_subcategory_id
                  WHERE S.id ='$id' limit 1
                  ";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
    public function fetch_supplier_name($supplier_id)
    {
        $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM pack_supplier where id='$supplier_id'";
        $query = $db ->query($sql);
        $result=$query->getResult('array');
        return isset($result[0]['supplier_name'])?$result[0]['supplier_name']:'';   
    }
    public function fetch_supplier()
    {
        $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM pack_supplier";
        $query = $db ->query($sql);
        $result=$query->getResult('array');
        return $result;
    }
    public function cnt_supplier()
    {
        $db    = \Config\Database::connect();
        $sql   = "SELECT count(*) as cnt FROM pack_supplier";
        $query = $db ->query($sql);
        $result=$query->getResult('array');
        return isset($result[0]['cnt'])?$result[0]['cnt']:'0'; 
    }
     public function cnt_product()
    {
        $db    = \Config\Database::connect();
        $sql   = "SELECT count(*) as cnt FROM pack_product";
        $query = $db ->query($sql);
        $result=$query->getResult('array');
        return isset($result[0]['cnt'])?$result[0]['cnt']:'0'; 
    }
    public function cnt_product_ses($supplier_id)
    {
        $db    = \Config\Database::connect();
        $sql   = "SELECT count(*) as cnt FROM pack_product where supplier_id='$supplier_id'";
        $query = $db ->query($sql);
        $result=$query->getResult('array');
        return isset($result[0]['cnt'])?$result[0]['cnt']:'0'; 
    }
     public function cnt_user()
    {
        $db    = \Config\Database::connect();
        $sql   = "SELECT count(*) as cnt FROM pack_user";
        $query = $db ->query($sql);
        $result=$query->getResult('array');
        return isset($result[0]['cnt'])?$result[0]['cnt']:'0'; 
    }
      public function cnt_category()
      {
          $db    = \Config\Database::connect();
          $sql   = "SELECT count(*) as cnt FROM pack_category";
          $query = $db ->query($sql);
          $result=$query->getResult('array');
          return isset($result[0]['cnt'])?$result[0]['cnt']:'0'; 
      }
      public function search_step_supplier($search_value,$search_type)
    {  
        $db = \Config\Database::connect();
        /*$sql="select * from  pack_supplier where id='$search_value'";
        $query=$db ->query($sql);
        //$result=$query->getResult('array');
        return $query;*/
       return $this
                      ->table('supplier a')
                      ->select()
                      ->where('id', $search_value)
                      ->where('is_email_verified','Verified')
                      ->paginate(20);

    }
    public function search_step_sub_cat_supplier($search_value,$search_type)
    {  
        $db = \Config\Database::connect();
        $sql="select * from  pack_supplier where subcategory_id='$search_value'";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return $result;
       

    }
  public function fetch_next_step_supplier($category_id,$subcategory_id)
  {
      $db = \Config\Database::connect();
      $sql="select  * FROM pack_supplier where json_contains(subcategory_id, JSON_OBJECT('$category_id','$subcategory_id'));";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';
  }
  public function filter_supplier($first_filter_value,$second_filter_value,$third_filter_value,$category_id)
  {
    $order_by='';
    $db = \Config\Database::connect();
    if($first_filter_value=="asc")
    {
      $order_by='order by supplier_name asc';
    }
    else if($first_filter_value=="desc")
    {
       $order_by='order by supplier_name desc';
    }
    else
    {
       $order_by='order by id desc';
    }
    $second='';
    foreach ($second_filter_value as $key => $value) 
    {
      if($key==0)
      {
        $second=$value;
      }
      else
      {
       $second .=','.$value;
      }  
    }
    $third='';
    foreach ($third_filter_value as $key => $value) 
    {
     if($key==0)
      {
        $third=" p.category_id='$category_id' and p.sub_category_id='$value' and p.product_status='Approved'";
      }
      else
      {
       $third .=' or '. " p.category_id='$category_id' and p.sub_category_id='$value' and p.product_status='Approved'";
      }
    }
    

    $sql="select  * FROM pack_supplier as s  left join pack_product as p on p.supplier_id=s.id  where business_category in ($second) and ($third) group by p.supplier_id   $order_by";
    $query=$db ->query($sql);
    $result=$query->getResult('array');
    return isset($result)?$result:'';  

  }
  public function filter_third_sub_cat_supplier($first_filter_value,$second_filter_value,$third_filter_value,$subcategory_id,$category_id)
  {
    $order_by='';
    $db = \Config\Database::connect();
    if($first_filter_value=="asc")
    {
      $order_by='order by supplier_name asc';
    }
    else if($first_filter_value=="desc")
    {
       $order_by='order by supplier_name desc';
    }
    else
    {
       $order_by='order by id desc';
    }
    $second='';
    foreach ($second_filter_value as $key => $value) 
    {
      if($key==0)
      {
        $second=$value;
      }
      else
      {
       $second .=','.$value;
      }  
    }
    $third='';
    foreach ($third_filter_value as $key => $value) 
    {
     if($key==0)
      {
        //$third="json_contains(third_subcategory_id, JSON_OBJECT('$subcategory_id','$value'))";
         $third=" p.category_id='$category_id' and p.sub_category_id='$subcategory_id' and p.product_status='Approved' and p.third_category_id='$value'";
      }
      else
      {
       //$third .=' or '. " json_contains(third_subcategory_id, JSON_OBJECT('$subcategory_id','$value'))";
        $third.=" or "." p.category_id='$category_id' and p.sub_category_id='$subcategory_id' and p.product_status='Approved' and p.third_category_id='$value'";
      }
    }
    

      $sql="select  * FROM pack_supplier as s  left join pack_product as p on p.supplier_id=s.id  where business_category in ($second) and ($third) group by p.supplier_id   $order_by";
    $query=$db ->query($sql);
    $result=$query->getResult('array');
    return isset($result)?$result:'';  

  }
  public function old_system_supplier($category_id,$sub_cat_id)
  {
      $db = \Config\Database::connect();
      $sql="select s.* FROM pack_product as p
            right join pack_supplier as s on s.id=p.supplier_id
            where p.category_id='$category_id' and p.sub_category_id='$sub_cat_id' and p.product_status='Approved' and s.is_email_verified='Verified' group by p.supplier_id";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';
  }
  public function old_system_supplier_by_third($category_id,$subcategory_id,$third_subcategory_id)
  {
      $db = \Config\Database::connect();
      $sql="select s.*,p.supplier_id as supplier_id FROM pack_product as p
            right join pack_supplier as s on s.id=p.supplier_id
            where p.category_id='$category_id' and p.sub_category_id='$subcategory_id' and p.product_status='Approved' and p.third_category_id='$third_subcategory_id' and s.is_email_verified='Verified' group by p.supplier_id";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';

  }
}