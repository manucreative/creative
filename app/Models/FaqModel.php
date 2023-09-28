<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
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

    public function updateFaqs($faq_id, $data){
        return $this->update($faq_id, $data);
    }

    public function getFaq($faq_id = false){
        if($faq_id === false){
            return $this->findAll();
        }else{
            return $this->where(['faq_id' => $faq_id])->first();
        }
    }

    public function deleteFaqs($faqIds){
        $isIdExist = $this->whereIn('faq_id', $faqIds)->findAll();
        if(empty($isIdExist)){
            return false;
        }
        if($this->db->table($this->table)->whereIn('faq_id', $faqIds)->delete()){
            return true;
        }else{
            return false;
        }
    }
}
