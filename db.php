<?php
$db = new Mysqli;
$db ->connect('localhost','root','amit','piathon',3306);
if(!$db)
{
    echo "Error Occured";
}
?>