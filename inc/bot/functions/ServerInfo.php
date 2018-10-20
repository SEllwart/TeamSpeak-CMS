<?php
function ServerInfo($tsAdmin, $config) {
$serverInfo = $tsAdmin->serverInfo();
//print_r($serverInfo);


// Create connection
$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "UPDATE server SET virtualserver_name='".$serverInfo['data']['virtualserver_name']."', virtualserver_welcomemessage='".$serverInfo['data']['virtualserver_welcomemessage']."', virtualserver_platform='".$serverInfo['data']['virtualserver_platform']."', virtualserver_version='".$serverInfo['data']['virtualserver_version']."', virtualserver_maxclients='".$serverInfo['data']['virtualserver_maxclients']."', virtualserver_password='".$serverInfo['data']['virtualserver_password']."', virtualserver_clientsonline='".$serverInfo['data']['virtualserver_clientsonline']."', virtualserver_channelsonline='".$serverInfo['data']['virtualserver_channelsonline']."', virtualserver_uptime='".$serverInfo['data']['virtualserver_uptime']."', virtualserver_hostmessage='".$serverInfo['data']['virtualserver_hostmessage']."', virtualserver_default_server_group='".$serverInfo['data']['virtualserver_default_server_group']."', virtualserver_default_channel_group='".$serverInfo['data']['virtualserver_default_channel_group']."', virtualserver_default_channel_admin_group='".$serverInfo['data']['virtualserver_default_channel_admin_group']."', virtualserver_hostbanner_url='".$serverInfo['data']['virtualserver_hostbanner_url']."', virtualserver_ip='".$serverInfo['data']['virtualserver_ip']."' WHERE id=1";



if ($conn->multi_query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>