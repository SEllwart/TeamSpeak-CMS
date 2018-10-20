<?php
function getUserById($id) {
    require $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
    $polaczenie = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password']);
    mysqli_select_db($polaczenie, $config['db']['database']);
    $zapytanie = "SELECT * FROM clients WHERE client_id=$id";
    $rezultat = mysqli_query($polaczenie, $zapytanie);
    $row = mysqli_fetch_assoc($rezultat);
    
    
    $return = array(
        "id" => $row['client_id'],
        "nick" => $row['client_nickname'],
        "uid" => $row['client_unique_id'],
        "lastconnected" => $row['client_lastconnected'],
        "connections" => $row['client_totalconnections'],
        "lastip" => $row['client_lastip']
    );
    return ($return);
}

function getUserIdByName($name) {
    require $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
    $polaczenie = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password']);
    mysqli_select_db($polaczenie, $config['db']['database']);
    $zapytanie = "SELECT * FROM `clients` WHERE `client_nickname` = '$name'";
    $rezultat = mysqli_query($polaczenie, $zapytanie);
    $row = mysqli_fetch_assoc($rezultat);
    $return = $row['client_id'];
    return ($return);
}

?>