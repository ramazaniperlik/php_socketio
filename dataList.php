<?php

require __DIR__ . '/connection.php';
include('iDataService.php');

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$dbConnection = new DbConnection();
$Connect = $dbConnection->getConnection();

$dataManager = new dataManager($Connect);
$datas = $dataManager->listData($data);
?>

<html>
    <head>
    <title>Elfatek Case</title>
    <meta charset="utf-8"/>
    </head>
    <body>
   <table>
<thead>
    <tr>
    <th>ID</th>
    <th>Data</th>
    <th>Date</th>
    </tr>
</thead>
<tbody id="datas">
    <?php foreach ($datas as $data):  ?>
        <tr>
        <th><?=$data['id']?></th>
        <th><?=$data['data']?></th>
        <th><?=$data['date']?></th>
         </tr>
         <?php endforeach;?>
    </body>
    </thead>
   </table>

    <script src="/socket.io/socket.io.js"></script>
        <script>
        var socket = io('http://localhost:5000');
        socket.on('datas',function(data){
            console.log(data);
        });
        socket.on('new-data',function(data){
            $('#datas').prepend(' <tr>
            <td>#${data.id}</td>
            <td>${data.data}</td>
            <td>${data.date}</td>
            </tr>
            '); 
        });
        // socket.emit('send-data',{
        //     "data":"Ramazan"
        // });
        </script>
    </body>
</html>

