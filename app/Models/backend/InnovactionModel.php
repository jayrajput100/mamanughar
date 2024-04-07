<?php 
namespace App\Models\backend;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class InnovactionModel extends Model
{
    protected $table          = 'innovaction';
    protected $primaryKey     = 'innovaction_id';
    protected $allowedFields  = ['innovaction_title','innovaction_image','innovaction_description','ip_address','supplier_id'];
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $createdField   = 'date_created';
    protected $updatedField   = 'date_modified';
    protected $db;
}