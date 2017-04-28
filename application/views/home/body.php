
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 col-md-offset-2 right-bar  col-lg-offset-2 ">
        <?php echo form_open('','class="editor"');?>
                <div class="form-group">
                    <?php echo form_input(array('class'=>'form-control my-input-box input-title','name'=>'notetitle','type'=>'text','placeholder'=>'Note Title'));?>
                </div>
                <div class="form-group">
                    <?php echo form_textarea(array('class'=>'form-control my-input-box input-text-area','name'=>'notebody','placeholder'=>'Note body'));?>
                </div>
        <?php echo form_close();?>
        </div>
    </div>
</div>