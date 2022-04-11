<?php
include("connect.php");

$query = "SELECT instructor_ID , name, year_of_experience FROM instructor WHERE year_of_experience >= 2 ORDER BY year_of_experience DESC, instructor_ID ASC";

// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 2</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q2 Answer</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>instructor_ID</td>";
echo "<td>name</td>";
echo "<td>year_of_experience</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['instructor_ID']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['year_of_experience']."</td>";
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


