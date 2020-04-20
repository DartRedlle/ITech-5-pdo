

<?php
include 'bd.php';
try
{ 
    $conn=new PDO($dsn,$user,$pass);
   
}
catch(PDOException $e)
{
    print "ERROR!!!!!".$e->getMessage()."<br/>";
    die();
}



$sql4="SELECT sum(in_traffic), sum(out_traffic) FROM seanse WHERE start >= :startTime AND stop <= :endTime";

$sth=$conn->prepare($sql4);
$sth->execute(array(':startTime' => $_GET['startTime'], ':endTime' => $_GET['endTime']));
$res=$sth->fetchAll();

echo"<table border=2><tr><th>Intraffic</th><th>OutTraffic</th></tr>";
    foreach($res as $row)
    {
        print("<tr><td>$row[0]</td><td>$row[1]</td></tr>");
    }
echo"</table>";
$conn=null;
