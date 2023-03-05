<body>
	<div id="subtitle">
        <h2>List of Reservation</h2>
	</div>
	<table id="tablerecords">
    	<thead>
            <tr>
        		<th>Reserve ID</th>
        		<th>Name</th>
				<th>Email</th>
                <th>Home Address</th>
                <th>Contact Number</th>
        		<th>Room No.</th>
                <th>Transaction Type</th>
            </tr>
        </thead>
		<?php
			$count = 1;
			if($reserve->list_reserve() != false){
				foreach($reserve->list_reserve() as $value) {
                    extract($value);
					?>
					<tbody>
      					<tr>
        					<td><?php echo $reserve->get_res_id($reserve_id);?></td>
        					<td><?php echo $reserve->get_cust_fname($cust_id).' '.$reserve->get_cust_mname($cust_id).' '.$reserve->get_cust_lname($cust_id); ?></td>
        					<td><?php echo $reserve->get_cust_email($cust_id);?></td>
							<td><?php echo $reserve->get_cust_address($cust_id);?></td>
        					<td><?php echo $reserve->get_cust_cnumber($cust_id)?></td>
							<td><?php echo $reserve->get_room_number($room_id);?></td>
							<td><?php echo $reserve->get_transaction_type_description($type_id);?></td>
							
						</tr>
					</tbody>
					<?php
 					    $count++;
					    }
                        }
                        
					else{
							?>
							<tr>
								<td colspan="7">"No Record Found."</td>
							</tr>
						<?php
					}
					?>
    </table>
</body>