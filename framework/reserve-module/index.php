<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-pen-to-square"></i>&nbspReservation</h1>
</div>    
<div id="wrapper">
    <div id="submenu">
        <a href="index.php?page=reserve&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Reservation</a>&nbsp&nbsp
        <a href="index.php?page=reserve&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate Reservation</a>&nbsp&nbsp
        <a href="index.php?page=reserve&subpage=remove"><i class="fa-sharp fa-solid fa-close"></i>&nbspCancel Reservation</a>
    </div>
    <div id="subcontent">
        <?php
        switch($subpage){
                case 'create':
                    require_once 'create-reserve.php';
                break;
                case 'records':
                    require_once 'read-reserve.php';
                break; 
                case 'profile':
                    require_once 'profile-reserve.php';
                break; 
                case 'remove':
                    require_once 'cancel-reserve.php';
                break;
                default:
                    require_once 'read-reserve.php';
                break;
            }
        ?>
    </div>
</div>
