<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class InstituteModel extends Model
{
    protected $table          = 'institute';
    protected $primaryKey     = 'institute_id';
    protected $allowedFields  = ['institute_type','institute_name','institute_contact_person','institute_mobile','institute_email','institute_website','ip_address','test_id','ins_course','ins_phone_no','institute_image'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    
     public function search_step_institute($search_value,$search_type)
    {  
        $db = \Config\Database::connect();
        /*$sql="select * from  pack_supplier where id='$search_value'";
        $query=$db ->query($sql);
        //$result=$query->getResult('array');
        return $query;*/
      if($search_type=="institute")
      {  
       return $this
                      ->table('institute a')
                      ->select()
                      ->where('institute_id', $search_value)
                      ->paginate(20);
      }
      else
      {
          $sql="select  * FROM pack_institute where test_id in($search_value)";
          $query=$db ->query($sql);
          $result=$query->getResult('array');
          return isset($result)?$result:'';   
      }  
    }
    public function filter_institute($first_filter_value,$second_filter_value,$institute_type)
    {
      $order_by='';
      $db = \Config\Database::connect();
      if($first_filter_value=="asc")
      {
        $order_by='order by institute_name asc';
      }
      else if($first_filter_value=="desc")
      {
         $order_by='order by institute_name desc';
      }
      else
      {
         $order_by='order by institute_id desc';
      }
      $second='';
      foreach ($second_filter_value as $key => $value) 
      { 
        if($institute_type=="Testing")
        { 
          if($key==0)
          {
             $second=" test_id in($value)";
          }
          else
          {
            $second .=" or test_id in($value)";
          }  
        }
        else
        {
          if($key==0)
          {
             $second="FIND_IN_SET('$value',ins_course)";
          }
          else
          {
            $second .="OR FIND_IN_SET('$value',ins_course) ";
          }   
        }  

      }
      if($institute_type=="Testing")
      {
       $sql="select  * FROM pack_institute where $second  $order_by";
       //select * FROM pack_institute where JSON_SEARCH(test_id, 'all', '1') is not null
      }
      else
      {
       $sql="select  * FROM pack_institute where $second  $order_by";  
      }  
      $query=$db ->query($sql);
      $result=$query->getResult('array');
      return isset($result)?$result:'';  

    }
}