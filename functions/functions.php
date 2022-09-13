
<?php
$mysqli = false;
function connectDB()
{
    global $mysqli;
    $mysqli = new mysqli(
        "localhost",
        "root",
        "",
        "агентство нерухомість"
    );
    $mysqli->query("SET NAMES 'utf-8'");
}

function closeDB()
{
    global $mysqli;
    $mysqli->close();
}

function getNews($limit, $id)
{
    global $mysqli;
    connectDB();
    if ($id)
        $where = "WHERE `id`=" . $id;
    $resulf = $mysqli->query("SELECT * FROM `q` $where  ORDER BY 'ID'
 DESC LIMIT $limit");
    closeDB();
    if (!$id)
        return resultToArray($resulf);
}

function resultToArray($resulf)
{
    $array = array();
    while (($row = $resulf->fech_assoc()) != false)
        $array[] = $row;
    return $array;
}
?>