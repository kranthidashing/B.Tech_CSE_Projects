<?php 
$n='http://api.football-data.org/v1/soccerseasons/405/fixtures';
$reqPrefs['http']['method'] = 'GET';
$reqPrefs['http']['header'] = 'X-Auth-Token: 8bdf77d454ab45e5816b9b32ff0b2386';
$stream_context = stream_context_create($reqPrefs);
$content=file_get_contents($n, false, $stream_context);
//echo $content;
$kran=json_decode($content,true);
//print_r($kran);
//echo $kran[0]['_links']['self']['href'];
$max=sizeof($kran['fixtures']);
for($m=0;$m<$max;$m++)
{
	echo $h=$kran['fixtures'][$m]['homeTeamName'];
	echo ' VS ';
	echo $a=$kran['fixtures'][$m]['awayTeamName'];
	echo '<br/>';
	echo 'scorces:-';
	echo $kran['fixtures'][$m]['homeTeamName'];
	echo '=';
	echo $kran['fixtures'][$m]['result']['goalsHomeTeam'];
	echo ' && ';
	echo $kran['fixtures'][$m]['awayTeamName'];
	echo '=';
	echo $kran['fixtures'][$m]['result']['goalsAwayTeam'];
	echo '<br/>';
	echo $kran['fixtures'][$m]['status'];
	echo '<br/>';
	echo '<br/>';
}
header('Refresh:5;URL=football_scorces.php');
?>