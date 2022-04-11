<?php
include("connect.php");

// prepare the database query
// select the branch_ID and name of the branches in the “Tai Po” district.
$query = "SELECT member.member_ID , member.name FROM member WHERE member_ID IN ( SELECT member_ID FROM enrollment WHERE class_ID IN (SELECT class_ID FROM class WHERE name LIKE 'Water Aerobics%')) ORDER BY member_ID DESC";

// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 4</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q4 Answer</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>member_ID</td>";
echo "<td>name</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['member_ID']."</td>";
    echo "<td>".$row['name']."</td>";
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


