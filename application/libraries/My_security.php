<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
*Created by Pijush Gupta and Pratyush Gupta
*-------------------------------------------------------------------------------------------------
* This class is resposible for extra user based security methods.								 |
*-------------------------------------------------------------------------------------------------
* Reason, Codeigniter's xss filter very old and implimentation is not upto the todays requirment | 
*-------------------------------------------------------------------------------------------------
*To access this methods, iclude this library first. "$this->load->library('MY_security')"  		 |
*-------------------------------------------------------------------------------------------------
*/

class MY_security
{
	function is_this_empty($data){
			if(is_array($data)){
				foreach ($data as $key => $value) {
					$arr[$key] = $this->is_this_empty($value);
            		if($arr[$key]==TRUE){
                		return TRUE;
            		}
				}
			}

			if($data=='' || $data==null || $data==FALSE || $data==' '){
					return TRUE;
			}
	}
}