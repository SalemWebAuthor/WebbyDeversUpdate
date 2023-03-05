<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-user-tie"></i>&nbspAdmins</h1>
</div>
<div id="wrapper">
    <div id="submenu">
        <a href="index.php?page=admins&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Admins</a>&nbsp&nbsp
        <a href="index.php?page=admins&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate New Admin</a>
    </div>
    <div id="subcontent">
        <?php
            switch($subpage){
                case 'create':
                    require_once 'create-admin.php';
                break;
                case 'records':
                    require_once 'read-admin.php';
                break; 
                case 'profile':
                    require_once 'profile-admin.php';
                break; 
                case 'remove':
                    require_once 'remove-admin.php';
                break; 
                default:
                    require_once 'read-admin.php';
                break;
            }
        ?>
    </div>
  </div>