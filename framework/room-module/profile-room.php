<div id="subtitle">
    <h2>Room No. <?php echo $room->get_room_number($id).' ';?>Profile</h2>
</div>
<div class="form-wrapper">
    <form method="POST" action="processes/process.room.php?action=update">
        <div id="form-half">
            <label for="room_id">Room ID: </label>
            <input type="text" id="room_id" class="text" name="room_id" value="<?php echo $room->get_room_id($id);?>" readonly>
            
            <label for="room_number">Room Number: </label>
			<input type="text" id="room_number" class="text" name="room_number" value="<?php echo $room->get_room_number($id);?>" placeholder="Enter Room No...." required>
            
            <label for="room_type">Room Type: </label>
		    <input type="text" id="room_type" class="text" name="room_type" value="<?php echo $room->get_room_type($id);?>" placeholder="Enter Room Type..." required>

            <label for="room_desc">Description: </label>
		    <input type="text" id="room_desc" class="text" name="room_desc" value="<?php echo $room->get_room_desc($id);?>" placeholder="Enter Description..." required>
        
            <input type="submit" value="Update">
        </div>
        <div id="form-half">
            <label for="room_floor">Room Floor: </label>
		    <input type="text" id="room_floor" class="text" name="room_floor" value="<?php echo $room->get_room_floor($id);?>" placeholder="Enter Room Floor..." required>

            <label for="room_price">Room Price: </label>
		    <input type="text" id="room_price" class="text" name="room_price" value="<?php echo $room->get_room_price($id);?>" placeholder="Enter Room Price..." required>
        
            <label for="room_vacancy">Room Vacancy: </label>
		    <input type="text" id="room_vacancy" class="text" name="room_vacancy" value="<?php echo $room->get_room_vacancy($id);?>" placeholder="Enter Room Slot..." required>

            <label for="room_status">Room Status: </label>
		    <input type="text" id="room_status" class="text" name="room_status" value="<?php echo $room->get_room_status($id);?>" placeholder="Enter Room Status..." readonly>        
        </div>
    </form>
</div>


