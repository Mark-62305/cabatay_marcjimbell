<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: Mod_Student
 * 
 * Handles listing and searching students with pagination support.
 */
class Mod_Student extends Model
{
    protected $table = "autable";

    public function __construct()
    {
        parent::__construct();
        $this->call->database(); // ✅ enable DB access
    }
    public function profile($ems, $passw){
        $result = $this->Mod_Student->raw(
            "SELECT * FROM {$this->table} WHERE email = '{$ems}' AND passw = '{$passw}'"
        );
        foreach($result as $profile){
            $data['id']=$profile['id'];
            $data['fname']=$profile['fname'];
            $data['lname']=$profile['lname'];
            $data['email']=$profile['email'];
            $data['age']=$profile['age'];
            $data['address']=$profile['address'];
            $data['passw']=$profile['passw'];
            $data['image_name']=$profile['image_name'];

        }
        return $data;
    }


    public function logi($ems, $passw) {
        $result = $this->Mod_Student->raw(
            "SELECT COUNT(id) as total FROM {$this->table} WHERE email = '{$ems}' AND passw = '{$passw}'"
        );
        foreach ($result as $row) {
            $boo = ($row['total'] != 0);
        }
        
        return $boo;
    }

    /**
     * COUNT RECORDS (all or with search)
     */
    public function count_records($keyword = '')
    {
        if (!empty($keyword)) {
            $args = ["%{$keyword}%"]; 
            $result = $this->Mod_Student->raw(
                "SELECT COUNT(id) as total FROM {$this->table} WHERE fname LIKE ?",
                $args
            );
            foreach ($result as $row):
                return $row;
            endforeach;
        }

        $sql = "SELECT COUNT(id) as total FROM {$this->table}";
        $result = $this->db->raw($sql);
		foreach ($result as $row):
		return $row;
		endforeach;
        
        
    }

    /**
     * GET RECORDS WITH PAGINATION (all or with search)
     */
    public function get_records($limit_clause, $keyword = '')
    {
        if (!empty($keyword)) {
            $args = ["%{$keyword}%"]; 
            $result = $this->Mod_Student->raw(
                "SELECT * FROM {$this->table} WHERE fname LIKE ?",
                $args
            );
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        $sql = "SELECT id, fname, lname, email 
                FROM {$this->table} 
                ORDER BY id DESC {$limit_clause}";
        $result = $this->db->raw($sql);
        return $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
    }
}
