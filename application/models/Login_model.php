<?php

class Login_model extends CI_Model
{

    public function auth_check($data)
    {
        $query = $this->db->get_where('user_table', $data);
        if($query){   
         return $query->row();
        }
        return false;
    }

}