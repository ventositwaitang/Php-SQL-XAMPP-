<?php
include("connect.php");

// prepare the database query
// select the branch_ID and name of the branches in the “Tai Po” district.
$query = "SELECT M.referrer_ID, R.name, count(M.referrer_ID) as num_of_referee
FROM Member M INNER JOIN Member R 
WHERE M.referrer_ID = R.member_ID
GROUP BY M.referrer_ID 
HAVING num_of_referee > 2
ORDER BY M.referrer_ID DESC";


// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>Question 8</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q8 Answer</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>branch_ID</td>";
echo "<td>name</td>";
echo "<td>num_of_referee</td>";
echo "</tr>";

// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['referrer_ID']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['num_of_referee']."</td>";
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


