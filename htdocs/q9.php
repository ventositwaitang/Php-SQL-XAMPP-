<?php
include("connect.php");

// prepare the database query
// select the branch_ID and name of the branches in the “Tai Po” district.
$query = "SELECT
C.class_ID,
C.name,
C.date,
C.capacity,
SUM(case when E.class_ID is not null then 1 else 0 end) AS num_of_enrollment
FROM
Class C
LEFT OUTER JOIN Enrollment E ON
E.class_ID = C.class_ID
WHERE
C.branch_ID = ".$_POST['ID']."
GROUP BY
C.class_ID
ORDER BY
C.branch_ID, C.class_ID
DESC";


// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 9</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q9_2 Answer</h3>";


// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>class_ID</td>";
echo "<td>name</td>";
echo "<td>date</td>";
echo "<td>capacity</td>";
echo "<td>num_of_enrollment</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['class_ID']."</td>";
    echo "<td><a href=/q10.php?class_ID=".$row['class_ID']."> ".$row['name']." </a></td>";
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['capacity']."</td>";
    echo "<td>".$row['num_of_enrollment']."</td>";
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


