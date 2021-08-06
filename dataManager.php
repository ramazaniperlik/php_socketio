<?php
include('connection.php');
include('iDataService.php');

require __DIR__ .'/vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

        $data = isset($_POST['data']) ? $_POST['data'] : '';//isset ile değişkene atama yapılmış mı kontrol edilir, 
        //burada kısa if kullanımı vardır.
        
        class dataManager implements iDataService{
            private $Connection = null;

            public function __construct($Connection){
                $this->Connection = $Connection;
            }
            //İnputa girilen verinin veritabanına ekleme işleminin yapıldığı fonksiyon
            public function addData($data){
                $sql = "insert into data(data) values('$data')";
                $this->Connection->query($sql); 

                $client = new Client(new Version2X('localhost:5000'));
                $client->initialize();
                $client->emit('new-data', [
                    'data' => $data
                ]);
                $client->close();
            }
            public function listData($data){
                $sql = "select * from data ORDER BY DESC($data)";
                $this->Connection->query($sql);
            }

        }

        //DB bağlantımızı ve ekleme işleminin yapılacağı fonksiyonun bulunduğu sınıfımızdan nesneler türettik 
        //ve gereken parametreleri gönderdik.
        $dbConnection = new DbConnection();
        $Connect = $dbConnection->getConnection();

        $dataManager = new dataManager($Connect);
        $dataManager->addData($data);

        header('Location:index.php');
        

       
        

       
?>