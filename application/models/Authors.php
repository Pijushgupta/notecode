<?php

/**
 * Model for Authors Table. Not limited to Authors table
 */
class Authors extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /*==========================================*/
    public function create_author($author_name = null, $author_email = null, $author_timezone = null, $author_password = null)
    {
        if ($author_name != null && $author_email != null && $author_timezone != null && $author_password != null) {
            $query = array(
                'author_name' => trim($author_name),
                'author_email' => trim($author_email),
                'author_timezone' => $author_timezone,
                'author_password' => md5(trim($author_password)),
                'author_password_status' => 1,
                'author_verified' => 0,
                'author_signup_time' => time(),
                'author_facebook' => 0,
                'author_books_limit'=>50

            );
            $this->db->insert('authors', $query);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*==========================================*/
    public function verify_author($email = null)
    {
        if ($email != null) {
            $this->db->set('author_verified', 1);
            $this->db->where('author_email', $email);
            $this->db->update('authors');
            return TRUE;
        } else {
            return FALSE;
        }

    }

    /*==========================================*/
    public function change_author_password_status($email = null, $value = null)
    {
        if ($email != null) {
            $get_query = $this->db->get_where('authors', array('author_email' => $email));
            if ($get_query->num_rows() > 0) {
                if ($get_query->row()->author_password_status == 1 && $value == null) {
                    $this->db->set('author_password_status', 0);
                    $this->db->where('author_email', $email);
                    $this->db->update('authors');
                    return TRUE;
                } elseif ($get_query->row()->author_password_status == 0 && $value == null) {
                    $this->db->set('author_password_status', 1);
                    $this->db->where('author_email', $email);
                    $this->db->update('authors');
                    return TRUE;
                } elseif ($value == 0 || $value == 1) {
                    $this->db->set('author_password_status', $value);
                    $this->db->where('author_email', $email);
                    $this->db->update('authors');
                    return TRUE;
                }
            } else {
                return FALSE;
            }
        }
    }

    /*==========================================*/
    public function get_author_password_status($email = null)
    {
        if($email!=null){
            $get_query = $this->db->get_where('authors', array('author_email' => $email));
            if($get_query->num_rows()>0){
                return $get_query->row()->author_password_status;
            }else{
                return FALSE;
            }
        }
    }

    /*==========================================*/
    public function change_author_password($author_email=null,$password=null){
        if($password!=null && $author_email!=null){
            $this->db->set('author_password',$password);
            $this->db->where('author_email',$author_email);
            $this->db->update('authors');
            return TRUE;
        }else{
            return FALSE;
        }
    }

  
}