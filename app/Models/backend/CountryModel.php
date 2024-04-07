<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class CountryModel extends Model
{
    protected $table          = 'pack_country';
    protected $primaryKey     = 'country_id';
    protected $allowedFields  = ['country_name','note','address'];
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
}