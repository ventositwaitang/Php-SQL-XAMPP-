<?php
include("connect.php");

$class_ID = intval($_GET['class_ID']);
#$num_of_enrollment = intval($_POST['num_of_enrollment']);

// prepare the database query
$query = "SELECT
C.class_ID,
C.name as class_name,
C.date,
C.capacity,
C.description,
I.name as instructor_name
From Class C,Instructor I
WHERE C.instructor_ID = I.instructor_ID AND class_ID = $class_ID
";

// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));


echo "<!DOCTYPE html><html>";
echo "<head>";
echo "<title>classes_enrollment</title>";
echo "</head>";
echo "<body  align=center>";
echo "<h3>classes_enrollment</h3>";

// display the table
echo "<table border='1' align='center'>";
echo "<tr>";
echo "<td>class_ID</td>";
echo "<td>class_name</td>";
echo "<td>date</td>";
echo "<td>capacity</td>";
echo "<td width='300'>description</td>";
echo "<td>instructor_name</td>";
echo "</tr>";
// print data with HTML
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    echo "<tr>";
    echo "<td>".$row['class_ID']."</td>";
    echo "<td>".$row['class_name']."</td>";
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['capacity']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td>".$row['instructor_name']."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>";
echo "<br>";

$query = "SELECT
SUM(case when E.class_ID is not null then 1 else 0 end) AS num_of_enrollment
FROM
Class C
LEFT OUTER JOIN Enrollment E ON
E.class_ID = C.class_ID
WHERE
C.class_ID = $class_ID
GROUP BY
C.class_ID
ORDER BY
C.branch_ID, C.class_ID
DESC";

// execute the query
$result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));
$num_of_enrollment = mysqli_fetch_array($result, MYSQLI_ASSOC)['num_of_enrollment'];

if ( $num_of_enrollment != 0) {
    // display the table
    echo "<table border='1' align='center'>";
    echo "<tr>";
    echo "<td>member_ID</td>";
    echo "<td>member_name</td>";
    echo "<td>classes_enrolled</td>";
    echo "</tr>";

    // if (isset($class_ID)){
    // prepare the database query
    $query = "SELECT 
    M.member_ID, 
    M.name as member_name, 
    GROUP_CONCAT(C.name) as classes_enrolled, 
    GROUP_CONCAT(E.class_ID) as enrolled_ID
    FROM Enrollment E 
    RIGHT OUTER JOIN Member M ON 
    E.member_ID = M.member_ID 
    LEFT OUTER JOIN Class C ON 
    C.class_ID = E.class_ID 
    WHERE E.member_ID IN( 
        SELECT 
        member_ID 
        FROM Enrollment E 
        INNER JOIN Class C ON 
        E.class_ID = C.class_ID 
        WHERE E.class_ID = $class_ID 
        ) 
    GROUP BY M.name
    ORDER BY M.member_ID DESC #, enrolled_ID DESC";

    // execute the query
    $result = mysqli_query($con,$query) or die( "Unable to execute query:".mysqli_error($con));

    // print data with HTML
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {   
        echo "<tr>";
        echo "<td>".$row['member_ID']."</td>";
        echo "<td>".$row['member_name']."</td>";
        #if {$row['classes_enrolled'] == $row['classes_enrolled']
            #echo"<br>"}else{ }
        echo "<td>";
        $enrolled_count = 0;
        $enrolled_classes = explode(',', $row['enrolled_ID']);
        
        foreach (explode(',', $row['classes_enrolled']) as &$enrolled) {
            if ($enrolled_classes[$enrolled_count] != $class_ID) {
                echo "<a href='classes_enrollment.php?class_ID=".$enrolled_classes[$enrolled_count]."'>".$enrolled."</a>";
                // echo "<a href=/q10.php?class_ID=".$row['enrolled_ID'].">".$row['classes_enrolled']."</a>";
            echo "<br>";
            }
            $enrolled_count++;
        }
        echo "</td>";
        echo "</tr>";
    }
}else{
    echo "<h4> No enrollment yet </h4>";
}

echo "</table>";
echo "<br><a href='index.html'>back</a>";
echo "</body>";
echo "</html>";

// free the tuple result and close the MySQL database connection
mysqli_free_result($result);
#mysqli_free_result($resultB);
mysqli_close($con);

?>
