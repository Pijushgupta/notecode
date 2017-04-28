<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: pijush
 * Date: 15/11/16
 * Time: 9:27 PM
 */

class Books extends MY_Model
{
	
	public function add_book($author_id=null,$book_name=null,$book_desc=null){

		if($author_id!=null && $book_name!=null){

			if($book_desc==null){
				$book_desc='';
			}
			$book = array(
				'book_author_id' =>$author_id , 
				'book_name'=>$book_name,
				'book_desc'=>$book_desc
				);
			if($this->db->insert('books',$book)){
				
				return TRUE;
			}
		}

	}

	public function return_total_number_of_books($author_id=null){
		if($author_id!=null){
			$query=$this->db->get_where('books',array('book_author_id',$author_id));
			if($query->num_rows()>0){
				return $query->num_rows();
			}else{
				return 0;
			}
		}

	}

	public function return_all_books($author_id=null){
		if($author_id!=null){
			$query = $this->db->get_where('books',array('book_author_id',$author_id));
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return 0;
			}
		}
	}

	public function return_all_books_array($author_id=null){
		if($author_id!=null){
			$query = $this->db->get_where('books',array('book_author_id',$author_id));
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return 0;
			}
		}
	}


}