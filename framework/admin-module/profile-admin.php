<div id="subtitle">
    <h2><?php echo $admin->get_username($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.admin.php?action=update">
        <div id="form-half">
            <label for="adm_username">Username: </label>
            <input type="text" id="adm_username" class="text" name="adm_username" value="<?php echo $admin->get_username($id);?>" readonly>
            
            <label for="adm_email">Email Address: </label>
		    <input type="text" id="adm_email" class="text" name="adm_email" value="<?php echo $admin->get_email($id);?>" placeholder="Enter Email Address..." required>

            <label for="adm_password">Password: </label>
		    <input type="text" id="adm_password" class="text" name="adm_password" value="<?php echo $admin->get_password($id);?>" placeholder="Enter Password..." required>
            
            <input type="submit" value="Update">
        </div>
        <div id="form-half">
            <label for="adm_fname">First Name: </label>
			<input type="text" id="adm_fname" class="text" name="adm_fname" value="<?php echo $admin->get_fname($id);?>" placeholder="Enter First Name..." required>
            
            <label for="adm_lname">Last Name: </label>
		    <input type="text" id="adm_lname" class="text" name="adm_lname" value="<?php echo $admin->get_lname($id);?>" placeholder="Enter Last Name..." required>
            
            <label for="adm_cnumber">Contact Number: </label>
		    <input type="text" id="adm_cnumber" class="text" name="adm_cnumber" value="<?php echo $admin->get_cnumber($id);?>" placeholder="Enter Contact No...." required>    
        </div>
    </form>
</div>

