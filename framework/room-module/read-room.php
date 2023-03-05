<body>
	<div id="subtitle">
		<h2>List of Rooms</h2>
	</div>
	<table id="tablerecords">
    	<thead>
			<tr>
        		<th>Room ID</th>
        		<th>Room No.</th>
        		<th>Room Type</th>
				<th>Room Description</th>
        		<th>Room Price</th>
				<th>Room Floor</th>
				<th>Room Vacancy</th>
				<th>Room Status</th>
			</tr>
		</thead>
		<?php
			$count = 1;

			if($room->list_rooms() != false){
				foreach($room->list_rooms() as $value){
   					extract($value);
					?>
					<tbody>
      					<tr>
        					<td><?php echo $room_id;?></td>
        					<td><a href="index.php?page=rooms&subpage=profile&id=<?php echo $room_id; ?>"><?php echo $room_number;?></a></td>
        					<td><?php echo $room_type;?></td>
							<td><?php echo $room_desc;?></td>
        					<td>Php <?php echo $room_price;?></td>
							<td><?php echo $room_floor;?></td>
							<td><?php echo $room_vacancy;?></td>
							<td><?php if ($room_vacancy == 0) {
  										echo $room_status = "Occupied";
										} else {
										echo $room_status = "Available";
										}?></td>
						</tr>
					</tbody>
					<?php
 						$count++;
						}
			}else{
						?>
						<tr>
							<td colspan="8">"No Record Found."</td>
						</tr>
					<?php
			}
			?>
    	</table>
</body>