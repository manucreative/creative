<?php

namespace App\Models;

use CodeIgniter\Model;

class FagModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_faq';
    protected $primaryKey       = 'faq_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['faq_question', 'faq_answer','created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function insertFaq($data){
        $this->insert($data);
    }

    public function getFaq($faq_id = false){
        if($faq_id === false){
            return $this->findAll();
        }else{
            return $this->where(['faq_id' => $faq_id])->first();
        }
    }
}
