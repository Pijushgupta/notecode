<nav class="navbar navbar-default navbar-fixed-top my-navbar">
    <div class="container-fluid">

        <div class="navbar-header">
            
            <a class="navbar-brand sitename" href="<?php echo site_url();?>">NOTECODE</a>
        </div>
        <div class="container-fluid hidden-xs hidden-sm">
        
            <?php /*List of books*/?>
            <div class="btn-group navbar-btn">
                <button type="button" class="btn btn-success my-text-one dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Wordpress <span class="caret"></span>
                </button>
                <ul class="dropdown-menu my-dropdown ">
                    <li class="my-text-one text-center">Books</li>
                    <li role="separator" class="divider"></li>
                    <input id="gab" type="hidden" value="<?php echo site_url('Ajax_controller/refresh_the_book_list') ;?>">
                    <?php if($book_list==0){ ?>
                    <li id="books-name"><a href="#">No Books</a></li>
                    <?php } else{ foreach ($book_list as $book) {?>
                    <li id="books-name"><a href="#"><?php echo $book->book_name ;?></a></li>
                    <?php }};?>
                 
                </ul>
            </div>
            <?php /*end of block*/?>

            <?php /*To create a new book*/?>
            <div class="btn-group navbar-btn" >
                <button type="button" id="book-list-button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><span class="lnr lnr-plus-circle"></span></button>
                <ul class="dropdown-menu my-dropdown" id="book-list">
                    <li class="my-text-one text-center">New Book</li>
                    <li role="separator" class="divider"></li>
                    <li>

                        <?php $controller_add_new_book = site_url('Ajax_controller/create_new_book');/* single point to change entire post(ajax) action*/?>

                        <?php echo form_open($controller_add_new_book);?>
                            <input id="cnbt" type="hidden" value="<?php echo $controller_add_new_book;?>">

                            <div class="form-group">
                                <?php echo form_input(array('id'=>'cnbn', 'class'=>'form-control', 'name'=>'new_book_name', 'type'=>'text', 'placeholder'=>'name'));?>
                            </div>

                            <div class="form-group">
                                <?php echo form_input(array('id'=>'cnbd','class'=>'form-control','name'=>'new_book_desc', 'type'=>'text','placeholder'=>'description (optional)'));?>
                            </div>
                            <?php echo form_submit(array('id'=>'cnbs','class'=>'btn btn-sm btn-success pull-right may-text-one','type'=>'submit','name'=>'submit','value'=>'create'));?>

                        <?php form_close();?>
                    </li>
                </ul>
            </div>
            <?php /*end of block*/?>

            <?php /*To delete book*/?>
            <div class="btn-group navbar-btn ">
                <button type="button" class="btn btn-default my-text-one dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="lnr lnr-circle-minus"></span>
                </button>
                <ul class="dropdown-menu my-dropdown">
                    <li class="my-text-one text-center">Delete Book</li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <form>
                            <div class="form-group">
                                <select class="form-control my-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <button class="btn btn-sm  btn-danger pull-right my-text-one">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
            <?php /*end of block*/?>

            <?php /*To create a new note*/?>
            <div class="btn-group navbar-btn">
                <button class="btn btn-success pull-right my-text-one"><span class="lnr lnr-file-add"></span></button>
            </div>
            <div class="btn-group navbar-btn navbar-right">
                <button type="button" class="btn btn-default my-text-one dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="lnr lnr-user"></span>
                </button>
                <ul class="dropdown-menu my-dropdown">
                    <li class="my-text-one text-center">Settings</li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="<?php echo site_url('Home/logout');?>">Logout</a></li>
                </ul>
            </div>
            <?php /*end of block*/?>

        </div>
    </div>
</nav>
