<body>
	<div id="subtitle">
        <h2>Cancel Reservation</h2>
	</div>
    <div class="form-wrapper">
		<form action="processes/process.reserve.php?action=cancel" method="post">
			<label for="reserve_id">Choose Reservation ID:</label>
                <select id="reserve_id" name="reserve_id">
                    <?php
                    if($reserve->list_reserve() != false){
                        foreach($reserve->list_reserve() as $value){
                            extract($value);
                            ?>
                            <option value="<?php $reserve->get_res_id($reserve_id);?>"><?php echo $reserve->get_cust_fname($cust_id).' '.$reserve->get_cust_mname($cust_id).' '.$reserve->get_cust_lname($cust_id).' '; ?>
							<p>(<?php echo $reserve->get_room_number($room_id);?>)</p></option>
                            <?php   
                        }
                    }
                ?>
                </select>
				<input type="submit" name="reserve_id" value="SUBMIT">
		</form>
    </div>
</body>
