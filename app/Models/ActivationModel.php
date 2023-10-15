<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'activations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['activation_id','activation_name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getActivations($activation_id = false){
        if($activation_id === false){
            return $this->findAll();
        }else{
            return $this->where(['activation_id' => $activation_id])->first();
        }
    }
}