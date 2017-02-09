<?php
$n='http://api.football-data.org/v1/soccerseasons';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token: 8bdf77d454ab45e5816b9b32ff0b2386';
$stream_context = stream_context_create($reqPrefs);
$content=file_get_contents($n, false, $stream_context);
//echo $content;
$kran=json_decode($content,true);
//print_r($kran);
//echo $kran[0]['_links']['self']['href'];
$max=sizeof($kran);

for($m=0;$m<$max;$m++)
{
	//echo $m;
	//echo '<br>';
	echo $kran[$m]['_links']['self']['href'];
	echo '<br/>';
	echo $kran[$m]['_links']['teams']['href'];
	echo '<br/>';
	echo $kran[$m]['_links']['fixtures']['href'];
    echo '<br/>';
    echo $kran[$m]['_links']['leagueTable']['href'];
    echo '<br/>';
    echo $kran[$m]['caption'];
    echo '<br/>';
    echo $kran[$m]['league'];
    echo '<br/>';
    echo $kran[$m]['year'];
    echo '<br/>';
    echo $kran[$m]['numberOfTeams'];
    echo '<br>';
    echo $kran[$m]['numberOfGames'];
    echo '<br>';
    echo $kran[$m]['lastUpdated'];
    echo '<br>';
    echo '<br>';

}

?>

