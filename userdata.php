<?php
include_once 'config.php'

?>


<html>
<head></head>
<body>
    

<?php
$sql = "SELECT *FROM user_form;";

$result = mysqli_query($conn,$sql);
$checkresult = mysqli_num_rows($result);

if ($checkresult > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        
    
        
       
        echo "ID " . $row["id"] . "<br>";      
        echo "Name: " . $row["fname"]. "<br>";
        echo "Birthday: " . $row["birthday"] . "<br>";
        echo "Id Number: " . $row["nic"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Number: " . $row["pnumber"] . "<br>";
        echo "<br>";
       
    }
} else {
    echo "No results found";
}
?>
</body>
</html>
