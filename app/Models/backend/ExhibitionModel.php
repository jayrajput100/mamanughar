<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class ExhibitionModel extends Model
{
    protected $table          = 'exhibition';
    protected $primaryKey     = 'exhibition_id';
    protected $allowedFields  = ['exhibition_from_date','exhibition_time','exhibition_venue','exhibition_logo','ip_address','exhibition_description','exhibition_to_date','exhibition_name','exhibition_city'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    
     public function fetch_exhibition_status($id)
    {
        $db = \Config\Database::connect();
        $today_date=date('d/m/Y');
        $sql="select * from pack_exhibition where  str_to_date('$today_date','%d/%m/%Y') between str_to_date(exhibition_from_date,'%d/%m/%Y') and str_to_date(exhibition_to_date,'%d/%m/%Y') and exhibition_id='$id'";
        $query=$db ->query($sql);
        $result=$query->getResult('array');
        return isset($result)?$result:'';	
    }
}