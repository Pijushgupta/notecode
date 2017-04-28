<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand sitename" href="<?php echo site_url(); ?>">NOTECODE</a>
        </div>
        <ul class="nav navbar-nav pull-right">
        <?php if($sign=="signup"){ ?>
            <li><a href="<?php echo site_url('Sign_up');?>" class="my-text-one">Sign Up</a></li>
        <?php }elseif($sign=="signin"){?>
        	<li><a href="<?php echo site_url('Public_login');?>" class="my-text-one">Sign In</a></li>
        <?php }?>
        </ul>
    </div>
</nav>
