<?php
function ClientList($tsAdmin, $config) {
$clientDbList = $tsAdmin->clientDbList();
print_r($clientDbList);

// Create connection
$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



foreach($clientDbList['data'] as $client){
	$clientcid = $client['cldbid'];
	$clientDbInfo = $tsAdmin->clientDbInfo($clientcid);
	$clientInfoD = $clientDbInfo['data'];
	print_r($clientInfoD);
	$sql="";

	if ($conn->multi_query($sql) === TRUE) {
		echo "";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();

}
?>