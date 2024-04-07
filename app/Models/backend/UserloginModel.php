<?php 
namespace App\Models\backend;

use CodeIgniter\Model;

class UserloginModel extends Model
{
    protected $table = 'user_log';
    protected $primaryKey = 'user_log_id';
    protected $allowedFields = ['user_id', 'log_in_date_time','log_out_date_time','browser_name','device_id','ip_address'];
    protected $returnType     = 'array';
    /*protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';*/
    /*protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];*/
}    