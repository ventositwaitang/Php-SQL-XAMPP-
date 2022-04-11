<?php
include("connect.php");


$query = "SELECT member_ID , name, TIMESTAMPDIFF(YEAR,date_of_birth,CURDATE()) AS age 
FROM member 
WHERE member_ID IN (
     SELECT member_ID 
     FROM enrollment 
     WHERE class_ID IN ( 
         SELECT class_ID 
         FROM class 
         WHERE instructor_ID IN ( 
             SELECT instructor_ID 
             FROM instructor 
             WHERE name = 'May Wong' ))) AND TIMESTAMPDIFF(YEAR,date_of_birth,CURDATE()) < 18 ORDER BY member_ID DESC";


// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 5</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q5 Answer</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>member_ID</td>";
echo "<td>name</td>";
echo "<td>age</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['member_ID']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br><a href='index.html'>back</a>";
echo "</body>";
echo "</html>";

// last step: free the tuple result and close the MySQL database connection
mysqli_free_result($result);
mysqli_close($con);

?>


