<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class CatalogModel extends Model
{
    protected $table          = 'catalog';
    protected $primaryKey     = 'catalog_id';
    protected $allowedFields  = ['catalog_name','catalog_path','supplier_id','ip_address','date_created','date_modified','admin_note','supplier_id','catalog_size','catalog_status','is_read'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
}    