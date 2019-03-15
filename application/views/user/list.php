
<div class="row">
    <div class="col-lg-12">           
        <h2><?php echo $heading;?>          
            <div class="pull-right float-right">
               <a class="btn btn-primary" href="<?php echo base_url('user_class/create') ?>">Add Contact</a>
            </div>
        </h2>
     </div>
</div>
<div class="table-responsive">
<?php if($this->session->flashdata('msg')): ?>
<p class="flash-msg"><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
<table id ="address_book" class="table table-bordered">
  <thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact Number</th>
			<th>Email Address</th>
			<th>Action</th>
		</tr>
  </thead>
  <tbody>
	<?php 
	if($users) {
		foreach ($users as $user) { ?>      
		    <tr>
			    <td>
				<?php echo $user->first_name; ?>
				</td>
				<td>
				<?php echo $user->last_name; ?>
				</td>     
				<td>
				<?php $contact_numbers = explode('|',$user->contact_number);
					foreach ($contact_numbers as $key => $contact_number){
					    echo $contact_number."<br>"; 
					}?>
				  </td>
				  <td>
					<?php
					$email_address = explode('|',$user->email_address);
					foreach ($email_address as $key => $single_email){?>
						<a href="mailto:<?php echo $single_email; ?>"><?php echo $single_email; ?></a> <br>
					<?php }?>
				  </td>  				  
			  	<td>
					<a class="btn btn-info btn-xs" href="<?php echo base_url('user_class/edit/'.$user->id) ?>">Edit</a>
					<a class="btn  btn-danger btn-xs" onclick="return delete_contact()" href="<?php echo base_url('user_class/delete/'.$user->id);?>">Delete<i class="glyphicon glyphicon-remove"></i></a>
			  </td>     
			  </tr>
			<?php }
	    } else { ?>
			 <tr>
				  <td colspan="3" align="center">No contacts were found.</td>
			 </tr>
	    <?php } ?>
  </tbody>
</table>
</div>