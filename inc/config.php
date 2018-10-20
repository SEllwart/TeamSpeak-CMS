<?php

$config = array(

    "strona" => array(
        "nazwa" => "MrSanten Teamspeak Site",			// Nazwa strony
        "logo" => "strona",								// link do logo strony
        "baner" => "inc/img/banner.png",				// link do baneru strony
        "ico" => "https://i.imgur.com/KCwBKbk.png",		// link do ico strony
        "adrests" => "ts3_ranksystem"					// Adres IP serwera ts
        ),
    "ts" => array(
        "ip" => "80.211.210.211",				// IP Serwera TS
        "nazwa" => "MrSanten Test Server",		// Nazwa serwera TS
		"querry" => "10011",					// Port querry TS
		"port" => "9987",						// Port serwera TS
		"user" => "serveradmin",				// Login użytkownika querry
		"password" => "YPu+5UJ6"				// Hasło użytkownika querry
        ),
    "db" => array(
        "host" => "localhost",			// Nazwa hosta
        "user" => "root",					// Nazwa użytkownika - domyślnie: root
        "password" => "",				// Haslo do bazy
        "database" => "mrsantents",			// Nazwa bazy
        )

);
?>