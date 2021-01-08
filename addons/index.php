<?php
$d = dir(".");

echo "<ul>";

while (false !== ($entry = $d->read()))
{
    if (is_dir($entry) && ($entry != '.') && ($entry != '..'))
        echo "<li><a href='{$entry}'>{$entry}</a></li>";
}

echo "</ul>";

$d->close();
?>