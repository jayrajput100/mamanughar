<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class TestModel extends Model
{
    protected $table          = 'test';
    protected $primaryKey     = 'test_id';
    protected $allowedFields  = ['test_name','ip_address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    public function fetch_test_name($id)
    {
    	 $db = \Config\Database::connect();
         $sql="select * from pack_test where test_id='$id'";
         $query=$db ->query($sql);
         return $query->getResult('array');
    }
}