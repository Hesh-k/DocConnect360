
<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);


@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html >
<head>
    <title>Admin</title>
    <link rel='stylesheet' href="admin.css">
   
    
    
</head>
<body>
    

    <div class="form">
        
            <div class="title">Hello <span><?php echo $_SESSION['admin_name'] ?></span></div>
            <div class="subtitle">Good Day !</div><br>

            <form action="userdata.php">
            <div>
            <input type="submit" class="submit" value="View Users"  >
            </div>
            </form>
            
            
        
            <div>
                <a href="delete.html"><button  class="submit"  >Delete Users</button>
            </div>
            
            <div style="margin-top: 170px;">
                <a href="logout.php"><button  class="submit"  >Log out</button>
            </div>    
                 
          


        </form>
    </div>
    
    
</body>
</html>