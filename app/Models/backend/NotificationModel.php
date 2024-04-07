<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class NotificationModel extends Model
{
    protected $table          = 'notification';
    protected $primaryKey     = 'notification_id';
    protected $allowedFields  = ['is_read','date','supplier_id','from_user_type','to_user_id','to_user_type','description','status','date_created','ip_address','product_id','date_modified'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
    public function fetch_all_notification($to_user_type)
    {
    		  $db    = \Config\Database::connect();
		      $sql   = "SELECT * FROM pack_notification where to_user_type='$to_user_type'";
		      $query = $db ->query($sql);
		      return $query->getResult('array');
    }
}    