<?php
include("connect.php");

// prepare the database query
// select the branch_ID and name of the branches in the “Tai Po” district.
$query = "SELECT I.instructor_ID, I.name, count(DISTINCT E.member_ID) as num_of_students
FROM Enrollment E INNER JOIN Class C INNER JOIN Instructor I 
WHERE E.class_ID = C.class_ID and C.instructor_ID = I.instructor_ID
GROUP BY I.instructor_ID 
HAVING num_of_students > 5
ORDER BY I.instructor_ID DESC";

// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 7</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q7 Answer</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>instructor_ID</td>";
echo "<td>name</td>";
echo "<td>num_of_students</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['instructor_ID']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['num_of_students']."</td>";
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


