<?php

/**
 * Created by PhpStorm.
 * User: rsora
 * Date: 2017/5/26
 * Time: 0:29
 */

session_start();

require 'config/dbconfig.php';
$dbc = dbc();
$query = "SELECT answer FROM t_answer";

$result = $dbc->query($query);

$arr;
$i = 1;
while ($row = $result->fetch_assoc()) {
    $arr[$i] = json_decode(urldecode($row['answer']), true);
    $i++;
}

$query = "SELECT question FROM t_questionnaire";

$result = $dbc->query($query);

arr1;
$i = 0;
while ($row = $result->fetch_assoc()) {
    $arr1[$i] = json_decode(urldecode($row['question']), true);
    $i++;
}

?>
<html>
<head>
</head>
<body>
<h1>fuck</h1>
<pre>
    <?php
    print_r($arr);
    ?>
</pre>
<h1>fuck again</h1>
<pre>
    <?php print_r($arr1)?>
</pre>
</body>
</html>
