<?php 

/**
* 
*/
class MY_Model extends CI_Model
{
	/*Will Return TRUE  if the author email/id is valid. And will return false if author email/id is does not valid.*/
	public function is_author($by_what=null,$value=null,$return_what=null){
		
		switch ($by_what) {

			case "email":{
				if($value!=null){
					$query=$this->db->get_where('authors',array('author_email'=>$value));
					if($query->num_rows()>0){

						switch ($return_what) {

							case "author_email":{
								return $query->row()->author_email;
								break;
							}
							case "author_password":{
								return $query->row()->author_password;
								break;
							}
							case "author_id":{
								return $query->row()->author_id;
								break;
							}
							case "author_piclink":{
								return $query->row()->author_piclink;
								break;
							}
							case "author_name":{
								return $query->row()->author_name;
								break;
							}
                            case "author_timezone":{
                                return $query->row()->author_timezone;
                                break;
                            }
                            case "author_verified":{
                                return $query->row()->author_verified;
                                break;
                            }
                            case "author_signup_time":{
                                return $query->row()->author_signup_time;
                                break;
                            }
                            case "author_facebook":{
                                return $query->row()->author_facebook;
                                break;
                            }
                            case "author_password_status":{
                                return $query->row()->author_password_status;
                                break;
                            }
                            case "author_books_limit":{
                                return $query->row()->author_books_limit;
                                break;
                            }
							default:{
								return TRUE;
								break;
							}
						}

					}else{
						return FALSE;
						break;
					}
				}
				return "NO DATA GIVEN";
				break;
			}
			
			case "id":{
				if($value!=null){
				$query=$this->db->get_where('authors',array('author_id'=>$value));
					if($query->num_rows()>0){

						switch ($return_what) {

							case "author_email":{
								return $query->row()->author_email;
								break;
							}
							case "author_password":{
								return $query->row()->author_password;
								break;
							}
							case "author_id":{
								return $query->row()->author_id;
								break;
							}
							case "author_piclink":{
								return $query->row()->author_piclink;
								break;
							}
							case "author_name":{
								return $query->row()->author_name;
								break;
							}
                            case "author_timezone":{
                                return $query->row()->author_timezone;
                                break;
                            }
                            case "author_verified":{
                                return $query->row()->author_verified;
                                break;
                            }
                            case "author_signup_time":{
                                return $query->row()->author_signup_time;
                                break;
                            }
                            case "author_facebook":{
                                return $query->row()->author_facebook;
                                break;
                            }
                            case "author_password_status":{
                                return $query->row()->author_password_status;
                                break;
                            }
                            case "author_books_limit":{
                                return $query->row()->author_books_limit;
                                break;
                            }
							default:{
								return TRUE;
								break;
							}
						}

					}else{
						return FALSE;
						break;
					}
				}
				return "NO DATA GIVEN";
				break;
			}
			default:{
				return "Even google can't search this shit!";
				
			}
		}
	}

}