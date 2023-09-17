<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'admin_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name','middle_name','last_name','email_address','password','telephone','role ','avatar','created_at'];

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

    public function loginAdmin($email, $password) {
        // Check if the email exists in the database
        $admin = $this->select('admin.*, roles.role_name')
            ->join('roles', 'roles.role_id = admin.role')
            ->where('email_address', $email)
            ->first();
    
        if ($admin && password_verify($password, $admin['password'])) {
            $adminData = [
                'admin_id' => $admin['admin_id'],
                'email_address' => $admin['email_address'],
                'first_name' => $admin['first_name'],
                'middle_name' => $admin['middle_name'],
                'last_name' => $admin['last_name'],
                'telephone' => $admin['telephone'],
                'avatar' => $admin['avatar'],
                'role' => $admin['role_name'],
                'logged_in' => true,
            ];
            return $adminData;
        } else {
            return false; // Invalid credentials
        }
    }

    public function isEmailUnique($email)
        {
    return $this->where('email_address', $email)->countAllResults() === 0;
        }

    public function getAdmins($admin_id = false){
        if($admin_id === false){
            return $this->select('admin.*, roles.role_name')
            ->join('roles', 'roles.role_id = admin.role')
            ->findAll();
        }else{
            return $this->where(['admin_id' => $admin_id])->first();
        }
    }

    public function insertAdmins($data){
        return $this->insert($data);
    }

    
    public function delete_admin_by_ids($ids) {
        $existingAdmins = $this->whereIn('admin_id', $ids)->findAll();
        if (empty($existingAdmins)) {
            return false;
        }
        if ($this->db->table($this->table)->whereIn('admin_id', $ids)->delete()) {
            foreach ($existingAdmins as $existingAdmin) {
                $existingImagePath = ROOTPATH . 'public/pub/media/admin_images/' . $existingAdmin['admin_img'];
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
                $this->delete($existingAdmin['admin_id']);
            }
             return true;
         } else {
             return false;
         }
    }

}
