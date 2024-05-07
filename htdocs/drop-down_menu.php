<?php
include("connect.php");
// prepare the database query
$query = "SELECT
B.name, 
C.branch_ID,
COUNT(C.class_ID) AS class_num
FROM
Branch B
INNER JOIN Class C WHERE
B.branch_ID = C.branch_ID
GROUP BY
C.branch_ID
ORDER BY
B.branch_ID
DESC";
// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>district_branch</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>Q9_1 Answer</h3>";

echo "<form action='district_branch.php' method='Post' align='center' >";
// Create a dropdown menu.
echo "<select name='ID'>";
// Add in options in the drop down menu

// Each selected tuple becomes an option in the dropdown menu.
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<option value='".$row["branch_ID"]."'>".$row["name"].": ".$row["class_num"]."</option>";
}

// if (isset($_GET['branch_ID'])){
//     $query = "SELECT * FROM t3_books B1, t3_belongs B2 WHERE B1.bookID=B2.bookID AND B2.categoryID=".$_GET['categoryID']." ;";
//     display the table
//     echo "<table border='1' align='center'>";
//     echo "<tr>";
//     echo "<td>name</td>";
//     echo "<td>class_num</td>";
//     echo "</tr>";
// }else{
//     $query = "SELECT * FROM t3_books;";
// }

echo "</select>";
echo "<br> </a>";
echo "<br><input type='submit' name='submit' value='submit'></a>";

echo "</form>";

#echo "<br><a href='index.html'>back</a>";

echo "</table>";
echo "</body>";
echo "</html>";

// last step: free the tuple result and close the MySQL database connection
mysqli_free_result($result);
mysqli_close($con);



?>
