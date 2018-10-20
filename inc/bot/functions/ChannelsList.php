<?php
function ChannelsList($tsAdmin, $config) {
$channelsList = $tsAdmin->channelList();
//print_r($channelsList);

// Create connection
$conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



foreach($channelsList['data'] as $channelList){
	$channelInfo = $tsAdmin->channelInfo($channelList['cid']);
	$channelInfoD = $channelInfo['data'];

	$sql = "REPLACE into `channellist` (cid, pid, channel_name, channel_topic, channel_description, channel_password, channel_codec, channel_codec_quality, channel_maxclients, channel_maxfamilyclients, channel_order, channel_flag_permanent, channel_flag_semi_permanent, channel_flag_default, channel_flag_password, channel_codec_latency_factor, channel_codec_is_unencrypted, channel_delete_delay, channel_flag_maxclients_unlimited, channel_flag_maxfamilyclients_unlimited, channel_flag_maxfamilyclients_inherited, channel_filepath, channel_needed_talk_power, channel_forced_silence, channel_name_phonetic, channel_icon_id, channel_flag_private) VALUES(".$channelList['cid'].", ".$channelInfoD['pid'].", '".$channelInfoD['channel_name']."', '".$channelInfoD['channel_topic']."', '".$channelInfoD['channel_description']."', '".$channelInfoD['channel_password']."', ".$channelInfoD['channel_codec'].", ".$channelInfoD['channel_codec_quality'].", ".$channelInfoD['channel_maxclients'].", ".$channelInfoD['channel_maxfamilyclients'].", ".$channelInfoD['channel_order'].", ".$channelInfoD['channel_flag_permanent'].", ".$channelInfoD['channel_flag_semi_permanent'].", ".$channelInfoD['channel_flag_default'].", ".$channelInfoD['channel_flag_password'].", ".$channelInfoD['channel_codec_latency_factor'].", ".$channelInfoD['channel_codec_is_unencrypted'].", ".$channelInfoD['channel_delete_delay'].", ".$channelInfoD['channel_flag_maxclients_unlimited'].", ".$channelInfoD['channel_flag_maxfamilyclients_unlimited'].", ".$channelInfoD['channel_flag_maxfamilyclients_inherited'].", '".$channelInfoD['channel_filepath']."', ".$channelInfoD['channel_needed_talk_power'].", ".$channelInfoD['channel_forced_silence'].", '".$channelInfoD['channel_name_phonetic']."', ".$channelInfoD['channel_icon_id'].", ".$channelInfoD['channel_flag_private'].")";

	if ($conn->multi_query($sql) === TRUE) {
		echo "";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();

}
?>