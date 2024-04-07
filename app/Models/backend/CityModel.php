<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class CityModel extends Model
{
    protected $table          = 'pack_city';
    protected $primaryKey     = 'city_id';
    protected $allowedFields  = ['city_name','country_id','state_id','note'];
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
    public function fetch_city(){
      $db    = \Config\Database::connect();
      $sql   = "SELECT * FROM pack_city";
      $query = $db ->query($sql);
      return $query->getResult('array');
    }
    public function getstate($id) {   
      $db    = \Config\Database::connect();
      $sql   =  "SELECT * FROM
                 pack_state as S 
                 JOIN pack_country as C on C.country_id = S.country_id 
                 WHERE C.country_id ='$id'";
      $query =  $db ->query($sql);
      $result=  $query->getResult('array');
      return isset($result)?$result:'';
    }
    public function getcity($id) {   
      $db    = \Config\Database::connect();
      $sql   =  "SELECT * FROM   
                pack_city as CT
                JOIN pack_country as C  ON C.country_id = CT.country_id
                JOIN pack_state   AS S  ON S.state_id   = CT.state_id
                WHERE CT.state_id ='$id'
                ";
      $query =  $db ->query($sql);
      $result=  $query->getResult('array');
      return isset($result)?$result:'';
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
    public function fetch_cityrecord($id) {   
      $db    = \Config\Database::connect();
      $sql   =    "SELECT * FROM   
                  pack_city as CT
                  JOIN pack_country as C  ON C.country_id = CT.country_id
                  JOIN pack_state   AS S  ON S.state_id   = CT.state_id
                  WHERE CT.city_id ='$id' limit 1
                  ";
      $query =  $db ->query($sql);
      $result=  $query->getResult('array');
      return isset($result[0])?$result[0]:'';
    }
}