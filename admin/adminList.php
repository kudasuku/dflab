<html>
<head>
        <title>DF LAB MANAGEMENT SYSTEM</title>
</head>

<?php
    //call file to connect the server
    include ("header.php");
?>
<h2>LIST OF FIGURE </H2>

<?php

    //make the query
    $q = "SELECT * FROM figures ORDER BY figID";

    //run the query and assign it to variable $result
    $result = @mysqli_query ($connect, $q);

    if ($result)
    {
        //table heading
        echo '<table border ="2">
        <tr>
        <td align ="center"><strong>ID</strong></td>
        <td align ="center"><strong>FIGURE NAME</strong></td>
        <td align ="center"><strong>FIGURE PRICE</strong></td>
        <td align ="center"><strong>FIGURE QUANTITY</strong></td>
        <td align ="center"><strong>UPDATE</strong></td>
        <td align ="center"><strong>DELETE</strong></td>
        </tr>';

        //fetch and print all the records
        while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<tr>
            <td>'.$row['figID'].'</td>
            <td>'.$row['figName'].'</td>
            <td>'.$row['figPrice'].'</td>
            <td>'.$row['fiqQuantity'].'</td>
            <td align="center"><a href="adminUpdate.php?id='.$row['figID'].'">Update</a></td>
            <td align="center"><a href="adminDelete.php?id='.$row['figID'].'">Delete</a></td>
            </tr>';
        }
        //close the table
        echo'</table>';

        //free up the resources
        mysqli_free_result($result);

        //if failed to run
    }
    else
    {

        //error message
        echo '<p class="error">THE CURRENT USER COULD NOT BE RETRIEVED.WE APOLOGIZE FOR ANY INCOVENIENCE.</p>';

        //debugging message
        echo'<p>'.mysqli_error ($connect).'<br><br/>Query;'.$q.'</p>';
    } //end of if result
    //close the database connection
    mysqli_close($connect);
    

?>
</div>
</div>
</body>
</html>

