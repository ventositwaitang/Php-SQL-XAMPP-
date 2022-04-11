<?php
include("connect.php");

$query = "SELECT class_ID, name, description, date FROM class WHERE name LIKE 'Yoga%' OR description LIKE '%Hatha%' AND description LIKE '%Ashtanga%' ORDER BY class_ID DESC";

// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 1</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q1 Answer</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>class_ID</td>";
echo "<td>name</td>";
echo "<td>description</td>";
echo "<td>date</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['class_ID']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td>".$row['date']."</td>";
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


