<div class="row">
    <div class="col-lg-12">           
        <h2><?php echo $heading; ?></h2>
        <div class="pull-right float-right">
            <a class="btn btn-primary" href="<?php echo base_url('user_class');?>">Back to Contact List</a>
        </div>
     </div>
</div>
<div class="errors">
<?php 
echo validation_errors();
?>
</div>
<div class="row h-75 justify-content-center align-items-center">
<?php 
echo form_open('user_class/store', 'class="add_contact" name="add_contact" id="add_contact"');
?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">First Name<span class="mandatory"> *</span></label>
                <div class="col-md-9">
                    <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo set_value('first_name');?>">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Last Name<span class="mandatory"> *</span></label>
                <div class="col-md-9">
                     <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo set_value('last_name');?>">
                </div>
            </div>
        </div>
         <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Contact Number<span class="mandatory"> *</span></label>
                <div class="col-md-9" id="phone">
                     <input type="text" name="contact_number[]" id="contact_number[]" class="form-control" value="<?php echo set_value('contact_number[]');?>"> <button id="add_phone" class="btn btn-primary">Add More Contact Number</button>
                </div>
            </div>
        </div>
         <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Email Address<span class="mandatory"> *</span></label>
                <div class="col-md-9" id="email">
                     <input type="email" name="email_address[]" id="email_address[]" class="form-control" value="<?php echo set_value('email_address[]');?>"><button  id ="add_email" class="btn btn-primary">Add More Email Address</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn btn-success">
             <button type="reset" value="Reset" class="btn btn-secondary" >Reset</button>

        </div>
    </div>
<?php
echo form_close();
?>
</div>