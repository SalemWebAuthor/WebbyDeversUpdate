<html>
    <head>
        <title>Reservation</title>
    </head>
<body>
    <div id="subtitle">
        <h2>Reserve Here</h2>
    </div>
    <div class="form-wrapper">
        <form action="processes/process.reserve.php?action=new" method="post">
            <div id="form-half">
                <label for="cust_id">Customer Name:</label>
                <select id="cust_id" name="cust_id">
                    <?php
                    if($reserve->list_customer() != false){
                        foreach($reserve->list_customer() as $value){
                            extract($value);
                            if($cust_status != "Reserved"){
                            ?>
                            <option value="<?php echo $cust_id;?>"><?php echo $cust_fname.' '.$cust_mname.' '.$cust_lname; ?></option>
                            <?php
                            }
                        }
                    }
                ?>
                </select>

                <label for="trans_id">Transaction Type:</label>
                <select id="trans_id" name="trans_id">
                    <?php
                    if($reserve->list_transaction_type() != false){
                        foreach($reserve->list_transaction_type() as $value){
                            extract($value);
                            ?>
                            <option value="<?php echo $type_id;?>"><?php echo $reserve->get_transaction_type_description($type_id);?></option>
                            <?php
                        }
                    }
                ?>
                <input type="submit" value="SUBMIT">
                </select>
            </div>
            <div id="form-half">
                <label for="room_id">Available Rooms:</label>
                <select id="room_id" name="room_id">
                    <?php
                    if($room->list_rooms() != false){
                        foreach($room->list_rooms() as $value){
                            extract($value);
                            if($room_vacancy != 0){
                            ?>
                            <option value="<?php echo $room_id;?>"><?php echo $room_number;?></option>
                            <?php
                            }
                        }
                    }
                ?>
                </select>   
            </div>
        </form>
    </div>
</body>
</html>