<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class UserModel extends Model
{
    protected $table          = 'user';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['fname','lname','email','mobile','gender','address','company_name','country_id','state_id','city_id','password','otp','otp_datetime','status','is_mobile_verified','is_email_verified'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
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
      $sql   = "SELECT * FROM user";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function fetch_sub_category(){
    	$db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_sub_category";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    
}