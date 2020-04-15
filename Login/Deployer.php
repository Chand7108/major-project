<?php
//Connecting to Database
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

//Total Voters
//echo $total_voters;

//Initiating Middleware.php which generates and stores Ethereum Account Info
$WshShell = new COM("WScript.Shell");
$oExec = $WshShell->Run("php Middleware.php", 0, false);


echo "Wait while accounts are generated : \n";
sleep(5);


//Reading AccountsInfo File to extract Public and Private Keys
$fh = fopen('AccountsInfo.txt','r');

//Opwning 2_deploy_contract.js file to write Eligible Voters Addresses
$file_deploy_contract = getcwd() . "/Vote/migrations/2_deploy_contracts.js";
$file_content = file( $file_deploy_contract , FILE_IGNORE_NEW_LINES );

//Skipping first five lines
$i = 0;
while ($i<4 && $line = fgets($fh)) {
	$i++;
}

$i=0;

$addresses_voters = 'var addresses = [';

//Extracting Wallet Addresses 
while ($i<$total_voters && $line = fgets($fh)) {
 	//Public Addresses that need to be stored in an array of deploy_contract.js
 	if($i!=0) 
 		$addresses_voters = $addresses_voters.',';	
 	// if($i==$total_voters-1)
 	// {
 	// 	$addresses_voters = $addresses_voters.'\''.str_replace(" ", '', str_replace("\n", '', substr($line,4))).'\'';
 	// }
 	// else $addresses_voters = $addresses_voters.'\''.str_replace("\n", '', substr($line,4)).'\'';
	$addresses_voters = $addresses_voters.'\''.str_replace(" ", '', str_replace("\n", '', substr($line,4))).'\'';
	//echo(substr($line,4));
 	$i++;
}

$addresses_voters = $addresses_voters.'];';
//$addresses_voters = $addresses_voters.'];';

echo $addresses_voters;

$file_content[4] = $addresses_voters;
file_put_contents( $file_deploy_contract , implode( "\n", $file_content ) );


//Again skipping three lines
$i=0;
while ($i<3 && $line = fgets($fh)) {
	$i++;
}

$i=1;


//Extracting Private Keys 
while ($i<=$total_voters && $line = fgets($fh)) {
 	//Private keys that should be stored in database and is further used by Voters to integrate Metamask
	//echo(substr($line,4));
	$sql_query = "UPDATE login_users SET ethereum_privatekey='".substr($line,4)."'where id=".$i;
	if ($conn->query($sql_query) === TRUE) {
    //echo "Record updated successfully";
	} else {
    echo "Error updating record: " . $conn->error;
	}
 	
 	$i++;

}

//Closing File Reading Stream
fclose($fh);

//Closing Database Connection
$conn->close();

?>