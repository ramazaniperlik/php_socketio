<?php
require __DIR__ .'/vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

require __DIR__.'connection.php';

        $dbConnection = new DbConnection();
        $Connect = $dbConnection->getConnection();

        $dataManager = new dataManager($Connect);
        $dataManager->addData($data);

        header('Location:index.php');

?>

<html>
    <head>
    <title>Elfatek Case</title>
    <meta charset="utf-8"/>
    <style>
        body
{
    display:flex;
    margin-top:10px;
    margin-left:10px;
    align-items:center;
    justify-content: center;
}
.form
{
    display:flex;
    justify-content:center;
    align-items:start;
    height:70%;
    width:60%;
    border:1px solid black;
    padding:20px;
}
.form input[type=text] {
    background-color: #d2dddc;
    color: white;
    outline: none;
    border: 0;
    border-radius:5px;
    width:240px;
    height:40px;
    padding:10px;
  }
  .form input[type=submit] {
    background-color: #3b6596;
    color: white;
    outline: none;
    border: 0;
    border-radius:5px;
    padding:5px;
    cursor:pointer;
    height:40px;
  }
    </style>
    </head>
    <body>
    <div class="form">
        <form action="dataManager.php" method="POST">
            <input type="text" name="data" placeholder="Eklemek istediğinizi yazınız..."/>
            <input type="submit" name="submit" value="Gönder"/>
            <hr/>
    </form>
    </div>
    <script src="/socket.io/socket.io.js"></script>
        <script>
        var socket = io('http://localhost:5000');
        socket.on('datas',function(data){
            console.log(data);
        });
        // socket.emit('send-data',{
        //     "data":"Ramazan"
        // });
        </script>
    </body>
</html>


