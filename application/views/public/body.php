<div class="container">
    <div class="row">
        <div class="col-md-5 col-centered">

            <?php if ($form == "signin") { /*This is the view for Sign in form (Public_login controller)*/ ?>
                <div class="panel panel-default margintop30percent">
                    <div class="panel-heading"> Sign In</div>
                    <div class="panel-body">
                        <?php echo form_open(''); ?>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'useremail2', 'type' => 'text', 'placeholder' => 'email')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'userpassword2', 'type' => 'password', 'placeholder' => 'password')); ?>
                        </div>
                        <?php echo form_submit(array('name'=>'submit' , 'class' => 'btn btn-success pull-right my-text-one', 'value' => 'sign in')); ?>
                        <a href="<?php echo site_url('Forgot_password'); ?>" class="my-text-one forgot-password">Forgot
                            Password?</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php if ($this->session->flashdata('error0')) { ?>
                    <div class="alert my-text-one"><?php echo $this->session->flashdata('error0'); ?></div>
                <?php } ?>
                <?php /*end of block*/ ?>

            <?php } elseif ($form == "signup") { /*This is the view for Sign up form (Sign_up controller)*/ ?>
                <div class="panel panel-default margintop30percent">
                    <div class="panel-heading"> Sign Up</div>
                    <div class="panel-body">
                        <?php echo form_open(''); ?>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'username', 'type' => 'text', 'placeholder' => 'name')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'useremail', 'type' => 'text', 'placeholder' => 'email')); ?>
                        </div>
                        <div class="form-group">
                            <select name="timezone" class="form-control">
                                <?php foreach ($time_zones as $time_zone) { ?>
                                    <option
                                        value="<?php echo $time_zone->value; ?>"><?php echo $time_zone->timezone_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'userpassword_one', 'type' => 'password', 'placeholder' => 'password')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'userpassword_two', 'type' => 'password', 'placeholder' => 'retype password')); ?>
                        </div>
                        <?php echo form_submit(array('name'=>'submit' , 'class' => 'btn btn-success pull-right my-text-one', 'value' => 'sign up')); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert my-text-one"><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>
                <?php /*end of the block*/ ?>

            <?php } elseif ($form == "forgot_password") { /*This is the view for Forgot password form (Forgot_password controller)*/ ?>
                <div class="panel panel-default margintop30percent">
                    <div class="panel-heading"> Forgot Password</div>
                    <div class="panel-body">
                        <?php echo form_open(''); ?>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'email_id', 'type' => 'text', 'placeholder' => 'registered email id')); ?>
                        </div>
                        <?php echo form_submit(array('name'=>'submit', 'class' => 'btn btn-success pull-right my-text-one', 'value' => 'recover password')); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php if ($this->session->flashdata('error1')) { ?>
                    <div class="alert my-text-one"><?php echo $this->session->flashdata('error1'); ?></div>
                <?php } ?>
            <?php  /*end of block*/ ?>

            <?php } elseif ($form == "reset_password") { /*This the view for change_author_password form (change_author_password controller)*/ ?>
                <div class="panel panel-default margintop30percent">
                    <div class="panel-heading"> Forgot Password</div>
                    <div class="panel-body">
                        <?php echo form_open(''); ?>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'first_password', 'type' => 'password', 'placeholder' => 'password')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input(array('class' => 'form-control', 'name' => 'second_password', 'type' => 'password', 'placeholder' => 'retype password')); ?>
                        </div>
                        <?php echo form_submit(array('name'=>'submit', 'class' => 'btn btn-success pull-right my-text-one', 'value' => 'reset password')); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <?php if ($this->session->flashdata('error2')) { ?>
                    <div class="alert my-text-one"><?php echo $this->session->flashdata('error2'); ?></div>
                <?php } ?>
            <?php } /*End of block*/?>



        </div>
    </div>
    <div class="row">
        <h3 class="front-tagline text-center">A Free & Simple Note taking Application for Everyone!!</h3>
    </div>
</div>