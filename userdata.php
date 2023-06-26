<?php
include_once 'config.php'

?>


<html>
<head>

<link rel='stylesheet' href="css/css.css">
</head>
<body>
    
<h1>User Data</h1>

<Table border="1px"; cellspacing ="0"; id="customers";>
    <tr>
        <th>ID</th>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Birthday</th>
        <th>Id Number </th>
        <th>email</th>
        <th>Mobile Number</th>
        
    </tr> 
  
      

<?php
$sql = "SELECT *FROM user_form;";

$result = mysqli_query($conn,$sql);
$checkresult = mysqli_num_rows($result);

if ($checkresult > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        
    
        
        echo "<tr>";
        echo "<td> " . $row["id"] . "</td>";      
        echo "<td> " . $row["fname"]. "</td>";
        echo "<td> " . $row["lname"]. "</td>";
        echo "<td> " . $row["birthday"] . "</td>";
        echo "<td>" . $row["nic"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["pnumber"] . "</td>";
       

        

        echo "</tr>";
        //echo "<br>";
       
    }
} else {
    echo "No results found";
}
?>


</Table>
</body>
</html>
