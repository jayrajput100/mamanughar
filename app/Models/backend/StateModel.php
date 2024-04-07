<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class StateModel extends Model
{
    protected $table          = 'pack_state';
    protected $primaryKey     = 'state_id';
    protected $allowedFields  = ['state_name','country_id','note','address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    
    public function fetch_country(){
      $db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_country";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function fetch_state(){
    	$db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_state";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function fetch_staterecord($id) {   
      $db    = \Config\Database::connect();
      $sql   =  "SELECT * FROM
                 pack_state as S 
                 JOIN pack_country as C on C.country_id = S.country_id 
                 WHERE S.state_id ='$id' limit 1";
      $query =  $db ->query($sql);
      $result=  $query->getResult('array');
      return isset($result[0])?$result[0]:'';
    }
}