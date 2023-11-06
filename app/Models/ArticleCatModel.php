<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleCatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'article_categories';
    protected $primaryKey       = 'cat_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cat_name','created_at','updated_at'];

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

    public function getArticlesCategories($cat_id = false){
        if ($cat_id === false){
            return $this->findAll();
        }else{
            return $this->where(['cat_id'=> $cat_id])->first();
        }
    }
}
