<?php
$content=file_get_contents("http://cricscore-api.appspot.com/csa");
//echo $content;
$array = json_decode($content,true);
//print_r($array);
$max=sizeof($array);

for($i=0;$i<$max;$i++)
{
//$array[$i]['id'];
echo $array[$i]['t1'];
echo '  VS  '; 
echo $array[$i]['t2'];
echo '<br/>';
echo '<br/>';
}


for($k=0;$k<$max;$k++)
{
$u=$array[$k]['id'];
$content=file_get_contents("http://cricscore-api.appspot.com/csa?id=$u");
$a=json_decode($content,true);
//print_r($a);
echo '<br/>';
echo '<br/>';
echo $a[0]['de'];
echo '<br/>';
echo $a[0]['si'];
}

header('Refresh:5;URL=cric.php');
?>