<?php
//Access Vanguard Databse and find number of accounts to be created
//Store it in a variable and then pass it to testrpc command

include "connection.php";

$sql_query = "SELECT count(*) FROM login_users";

$result = $conn->query($sql_query);

if ($result->num_rows > 0) {
    // Extracting total registered voters for Election
 	$row = $result->fetch_assoc();
	$total_voters = $row["count(*)"];

} else {
    echo "Invalid SQL results";
}


while (@ ob_end_flush()); // end all output buffers if any

//Generating Total Voters number of Ethereum Accounts
$proc = popen('ganache-cli -a'.$total_voters, 'r');
echo '<pre>';
while (!feof($proc))
{
    echo fread($proc, 4096);
    @ flush();
}
echo '</pre>';
?>