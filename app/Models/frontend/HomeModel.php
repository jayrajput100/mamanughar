<?php 
namespace App\Models\frontend;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class HomeModel extends Model
{
	public function fetch_categorydata()
    {   
        $db = \Config\Database::connect();
        $sql="SELECT 
        			category_id,
        			category_name,
        			category_desc,
        			category_image_path 
        			FROM pack_category order by category_name";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
  }
  public function fetch_exhibition()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
        $sql="select * from pack_exhibition where  str_to_date('$today_date','%d/%m/%Y') between str_to_date(exhibition_from_date,'%d/%m/%Y') and str_to_date(exhibition_to_date,'%d/%m/%Y') ORDER BY str_to_date(`exhibition_from_date`, '%d/%m/%Y') ASC limit 6";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
  }
  public function fetch_exhibition1()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
        $sql="select * from pack_exhibition where  str_to_date('$today_date','%d/%m/%Y') between str_to_date(exhibition_from_date,'%d/%m/%Y') and str_to_date(exhibition_to_date,'%d/%m/%Y') ORDER BY str_to_date(`exhibition_from_date`, '%d/%m/%Y') ASC ";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
  }
  public function upcoming_exhibition()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
       
        //echo $datetime->format('Y-m-d H:i:s');
        $next_date=date('d/m/Y', strtotime('tomorrow'));
        $sql="select * from pack_exhibition where str_to_date(exhibition_from_date,'%d/%m/%Y') > str_to_date('$next_date','%d/%m/%Y') ORDER BY str_to_date(`exhibition_from_date`, '%d/%m/%Y') ASC limit 6";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
    
  }
   public function upcoming_exhibition1()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
       
        //echo $datetime->format('Y-m-d H:i:s');
        $next_date=date('d/m/Y', strtotime('tomorrow'));
        $sql="select * from pack_exhibition where str_to_date(exhibition_from_date,'%d/%m/%Y') > str_to_date('$next_date','%d/%m/%Y') ORDER BY str_to_date(`exhibition_from_date`, '%d/%m/%Y') ASC ";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
    
  }
  public function fetch_advertisment()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
        $sql="select * from pack_advertisment where  str_to_date('$today_date','%d/%m/%y') between str_to_date(start_date,'%d/%m/%y') and str_to_date(end_date,'%d/%m/%y') ";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
  }
  public function fetch_advertisment1()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
        $sql="select * from pack_advertisment where  str_to_date('$today_date','%d/%m/%y') between str_to_date(start_date,'%d/%m/%y') and str_to_date(end_date,'%d/%m/%y') ";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
  }
  public function search_category($term)
  { 
     $db = \Config\Database::connect(); 
     $builder = $db->table('pack_category');
     $builder->like('category_name',$term);
     $query   = $builder->get();
     $result = $query->getResult('array');
     return isset($result)?$result:'';
  }
  public function search_sub_category($term)
  {
     $db = \Config\Database::connect(); 
     $builder = $db->table('pack_sub_category');
     $builder->like('sub_cat_name',$term);
     $query   = $builder->get();
     $result = $query->getResult('array');
     return isset($result)?$result:'';
  }
   public function expired_exhibition()
  {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
       
        //echo $datetime->format('Y-m-d H:i:s');
        $yesterday_date=date('d/m/Y', strtotime('yesterday'));
        $last_date=date("d/m/Y", strtotime('-3 months')); 
        $sql="select * from pack_exhibition where  str_to_date(exhibition_to_date,'%d/%m/%Y') between    str_to_date('$last_date','%d/%m/%Y') and str_to_date('$yesterday_date','%d/%m/%Y') ORDER BY str_to_date(`exhibition_from_date`, '%d/%m/%Y') DESC";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';
        //return $result; 
  }
  public function search_third_sub_category($term)
  {
     $db = \Config\Database::connect(); 
     $builder = $db->table('pack_third_sub_category');
     $builder->like('third_subcategory_name',$term);
     $query   = $builder->get();
     $result = $query->getResult('array');
     return isset($result)?$result:'';
  }
  public function search_supplier($term)
  { 
     $db = \Config\Database::connect(); 
     $builder = $db->table('pack_supplier');
     $builder->like('supplier_name',$term);
     $builder->where('is_email_verified','Verified');
     $query   = $builder->get();
     $result = $query->getResult('array');
     return isset($result)?$result:'';

  }
  public function search_test($term)
  {
     $db = \Config\Database::connect(); 
     $builder = $db->table('pack_test');
     $builder->like('test_name',$term);
     $query   = $builder->get();
     $result = $query->getResult('array');
     return isset($result)?$result:'';
  }
  public function search_institute($term)
  {
     $db = \Config\Database::connect(); 
     $builder = $db->table('pack_institute');
     $builder->like('institute_name',$term);
     $query   = $builder->get();
     $result = $query->getResult('array');
     return isset($result)?$result:'';
  }
  public function search_step_product($search_value,$search_type)
  {
      $db = \Config\Database::connect();
      $where='';
      if($search_type=="cat")
      {
       $where="where category_id='$search_value' and product_status='Approved'";
      }
      elseif ($search_type=="sub_cat") 
      {
       $where="where sub_category_id='$search_value' and product_status='Approved'";
      }
      else
      {
        $where="where third_category_id='$search_value' and product_status='Approved'";
      }  
      $sql="select * from pack_product  ".$where;
      $query=$db ->query($sql);
      $result=$query->getResult('array')->paginate(10);
      return isset($result)?$result:'';
  }
  
  public function search_step_institute($search_value,$search_type)
  {
      $db = \Config\Database::connect();
      $where='';
      if($search_type=="test")
      {
        $where="where test_id='$search_value'";
      }
      else
      {
         $where="where institute_id='$search_value'";
      }  
      $sql="select * from pack_institute ".$where;
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';
  }
  public function search_step_category($search_value,$search_type)
  {
      $db = \Config\Database::connect();
      $sql="select * from pack_category  where category_id='$search_value'";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';

  }
  public function search_step_sub_cat($search_value,$search_type)
  {
      $db = \Config\Database::connect();
      $sql="select * from pack_sub_category  where subcategory_id='$search_value'";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';

  }
   public function fetch_product($product_id)
  {
      $db = \Config\Database::connect();
      $sql="select * from pack_product  where product_id='$product_id'";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result[0])?$result[0]:'';

  }
  public function fetch_product_images($product_id)
  {
      $db = \Config\Database::connect();
      $sql="select * from pack_product_image  where product_id='$product_id'";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';
  }
  public function fetch_institute($institute_id)
  {
      $db = \Config\Database::connect();
      $sql="select * from pack_institute  where institute_id='$institute_id'";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result[0]:'';
  }
  public function fetch_gallery_images($supplier_id)
  {
      $db = \Config\Database::connect();
      $sql="select g.* from pack_gallery as g left join pack_supplier as s on s.id=g.supplier_id  where g.supplier_id='$supplier_id' and g.gallery_status='Approved' ";
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:''; 
  }
 
}
