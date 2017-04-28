<?php
$config = array(
    'user_login' => array(
        array(
            'field' => 'useremail2',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'userpassword2',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    ),
    'user_signup' => array(

        array(
            'field' => 'username',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'useremail',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'timezone',
            'label' => 'Timezone',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'userpassword_one',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'userpassword_two',
            'label' => 'Password',
            'rules' => 'trim|required|matches[userpassword_one]'
        )
    ),
    'email_verify' => array(
        array(
            'field' => 'email_id',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        )
    ),

    'password_match' => array(
        array(
            'field' => 'first_password',
            'label' => 'First Password',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'second_password',
            'label' => 'Second Password',
            'rules' => 'trim|required|matches[first_password]'
        )

    )
);