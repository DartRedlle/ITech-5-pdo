<?php
include 'bd.php'; 
$client='0';
try
{ 
    $conn=new PDO($dsn,$user,$pass);
    
}
catch(PDOException $e)
{
    print "ERROR!!!!!".$e->getMessage()."<br/>";
    die();
}
print_r($_POST);
$sql2="SELECT seanse.ID_Seanse,seanse.start,seanse.stop,seanse.in_traffic,seanse.out_traffic  
    FROM client JOIN seanse ON client.ID_Client = FID_Client
        WHERE client.name = :username";

    $sth=$conn->prepare($sql2);
    $sth->execute(array(':username' => $_GET['username']));
    $res=$sth->fetchAll();


    //<th><tr>id</tr><tr>start</tr><tr>stop</tr><tr>in_traffic</tr><tr>out_traffic</tr></th>"
    echo"<table border=1><tr><th>id</th><th>start</th><th>stop</th><th>in_traffic</th><th>out_traffic</th></tr>";    
        foreach($res as $row)
            {
                print("<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>");
            }
    echo"</table>";
    $conn=null;
