<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class AdvertismentModel extends Model
{
    protected $table          = 'pack_advertisment';
    protected $primaryKey     = 'add_id';
    protected $allowedFields  = ['title','start_date','end_date','add_image','description','ip_address','supplier_id'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    
    public function viewadvertisment($id){   
        $db    = \Config\Database::connect();
        $sql   = "SELECT * FROM pack_advertisment
                  WHERE add_id ='$id' limit 1
                  ";
        $query  = $db ->query($sql);
        $result = $query->getResult('array');
        return isset($result[0])?$result[0]:'';
    }
}