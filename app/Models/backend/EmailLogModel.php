<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class EmailLogModel extends Model
{
    protected $table          = 'email_log';
    protected $primaryKey     = 'email_log_id';
    protected $allowedFields  = ['user_id','supplier_id','email_log_subject','email_log_message','category_name','date_created','date_modified','ip_address'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
}    