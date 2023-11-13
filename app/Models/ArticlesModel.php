<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_articles';
    protected $primaryKey       = 'article_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['author_id','modifier_id','activation_id','article_key','url_link','meta_title','meta_description','article_title','short_content','article_content','cat_id','article_img','created_at','updated_at'];

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

    public function addArticle($data){
        return $this->insert($data);
    }
    /**
     * Undocumented function
     *
     * @param boolean $article_key
     * @param boolean $author
     * @return array of articles | articles by article_id | articles by admin_id
     */
    public function getArticles($article_key = false, $author = false) {
        $query = $this->select('tbl_articles.*, admin.first_name, admin.user_name, activations.activation_name,article_categories.cat_name')
            ->join('activations', 'activations.activation_id = tbl_articles.activation_id')
            ->join('admin', 'admin.admin_id = tbl_articles.author_id')
            ->join('article_categories', 'article_categories.cat_id = tbl_articles.cat_id')
            ->join('admin mod', 'mod.admin_id = tbl_articles.modifier_id');
    
        if ($article_key !== false && $author === false) {
            return $query->where(['article_key' => $article_key])->first();
        }
    
        if ($author !== false && $article_key === false) {
            return $query->where(['author_id' => $author])->findAll();
        }
    
        return $query->findAll();
    }

    public function updateArticles($article_id, $data){
                $affectedRows = $this->update($article_id, $data);
                if($affectedRows > 0){
                    return true;
                } else {
                    return false;
                }
    }

    public function getArticlesById($article_id){
        return $this->where(['article_id' => $article_id])->first();
    }

    public function getArticlesByUrl($url_link){
        return $this->select('tbl_articles.*, admin.first_name, admin.user_name, activations.activation_name,article_categories.cat_name')
        ->join('activations', 'activations.activation_id = tbl_articles.activation_id')
        ->join('admin', 'admin.admin_id = tbl_articles.author_id')
        ->join('article_categories', 'article_categories.cat_id = tbl_articles.cat_id')
        ->join('admin mod', 'mod.admin_id = tbl_articles.modifier_id')
        ->where(['url_link' => $url_link])->first();
    }
    public function getArticleByAdminId($authorId){
        return $this->select('tbl_articles.*, admin.first_name, admin.user_name, activations.activation_name,article_categories.cat_name')
        ->join('activations', 'activations.activation_id = tbl_articles.activation_id')
        ->join('admin', 'admin.admin_id = tbl_articles.author_id')
        ->join('article_categories', 'article_categories.cat_id = tbl_articles.cat_id')
        ->join('admin mod', 'mod.admin_id = tbl_articles.modifier_id')
        ->where(['author_id' => $authorId])->findAll();
    }

    public function getArticleByCategories($cat_id){
        return $this->select('tbl_articles.*, admin.first_name, admin.user_name, activations.activation_name,article_categories.cat_name')
        ->join('activations', 'activations.activation_id = tbl_articles.activation_id')
        ->join('admin', 'admin.admin_id = tbl_articles.author_id')
        ->join('article_categories', 'article_categories.cat_id = tbl_articles.cat_id')
        ->join('admin mod', 'mod.admin_id = tbl_articles.modifier_id')
        ->where(['tbl_articles.cat_id' => $cat_id])->findAll();
    }

    public function deleteArticles($ids){
        $existingArticles = $this->whereIn('article_id', $ids)->findAll();
        if (empty($existingArticles)) {
            return false;
        }
        $this->db->disableForeignKeyChecks();
        if ($this->db->table($this->table)->whereIn('article_id', $ids)->delete()) {
            foreach ($existingArticles as $existingArticle) {
                $existingImagePath = ROOTPATH . 'public/backend/media/article_images/' . $existingArticle['article_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $this->delete($existingArticle['article_id']);
            }
             return true;
         } else {
             return false;
         }
         $this->db->enableForeignKeyChecks();
     }

}
