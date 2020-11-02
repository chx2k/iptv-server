<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
die("This Command Not Working On WindowsOS");
} else {
if($_GET["cpu"] == "1") {
$data = sys_getloadavg();
$int = "CPU";

$time = date("U")."000";

$data1 = $data[0];
$data2 = $data[1];
$data3 = $data[2];

$_SESSION['cpu'][] = "[$time, $data1]";
$_SESSION['cpu'][] = "[$time, $data2]";
$_SESSION['cpu'][] = "[$time, $data3]";

$data['label'] = $int;
$data['data'] = $_SESSION['cpu'];

if (count(intval($_SESSION['cpu'])) > 60)
    {
        $x = min(array_keys($_SESSION['cpu']));
        unset($_SESSION['cpu'][$x]);
    }

echo '{"label":"'.$int.'","data":['.implode($_SESSION['cpu'], ",").']}'; 
} else {
die("No!");
}
}