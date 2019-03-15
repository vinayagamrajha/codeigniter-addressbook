<div class="row">
    <div class="col-lg-12">           
        <h2><?php echo $heading['heading'];?></h2>
		<div class="pull-right float-right">
               <a class="btn btn-primary" href="<?php echo base_url('user_class/index') ?>">Back to Contact List</a>
        </div>
     </div>
</div>
<div class="errors"><?php echo validation_errors(); ?></div>
<?php echo form_open('user_class/update', 'class="add_contact" name="add_contact" id="add_contact"'); ?>
	<input type="hidden" name="userid" value="<?php echo $user->id; ?>" />
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">First Name<span class="mandatory"> *</span></label>
                <div class="col-md-9">
                    <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Last Name<span class="mandatory"> *</span></label>
                <div class="col-md-9">
					<input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                </div>
            </div>
        </div>
		 <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
				<label class="col-md-3">Contact Number<span class="mandatory"> *</span></label>
				<div class="col-md-9"  id="phone" >
				<?php $contact_numbers = explode('|',$user->contact_number);
					foreach ($contact_numbers as $key => $contact_number){
				?>	
					<input type="text" name="contact_number[]" class="form-control" value="<?php echo $contact_number; ?>">
					<?php if($key == 0) { ?>
					    <button id="add_phone" class="btn btn-primary">Add More Contact Number</button>
							<?php } ?>
							 <?php if($key != 0) { ?>
								<a href="javascript:void(0);" class="remove_field">Remove</a>
							<?php } ?>
						
					<?php }?>
					</div>
            </div>
        </div>
		 <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
			  <label class="col-md-3">Email Address<span class="mandatory"> *</span></label>
				<div class="col-md-9"  id="email">
				<?php $email_address = explode('|',$user->email_address);
					foreach ($email_address as $key => $single_email){
				?>
                   <input type="email" name="email_address[]" class="form-control" value="<?php echo $single_email; ?>">
					<?php if($key == 0) { ?>
					    <button id="add_email" class="btn btn-primary">Add More Email Address</button>
					<?php } ?>
					<?php if($key != 0){ ?>
						<a href="javascript:void(0);" class="remove_field">Remove</a>
					<?php } ?>
				<?php }?>
				 </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="save" value="Update" class="btn btn-success">
			<a href="<?php echo base_url('user_class') ?>" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
<?php echo form_close();?>