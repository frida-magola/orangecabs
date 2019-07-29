<?php
require('connection.php');
require('../PHPMailerAutoload.php');

class NotifyAdmin{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'orangecabs_db';
    private $emailPassword = 'sU3!kO9A8J76';
    private $pdo;
    private $userId;
    private $subject;
    private $result = [];
    // private $adminEmail = 'dev@orangecabs.joburg';
    // private $adminEmail2 = 'info@orangecabs.co.za';
    // private $adminEmail3 = 'admin@orangecabs.co.za';

    //dev 
    private $adminEmail = 'mwalilanyira@gmail.com';
    private $adminEmail2 = 'mwalilanyira@yahoo.com';
    private $adminEmail3 = 'mwalilanyira@gmail.com';
    private $message;
    private $data;

    public function __construct($userId, $subject, $data = []){

        try{
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->userId = $userId;
            $this->subject = $subject;
            $this->data = $data;
            $this->notify();

        }catch(PDOException $e){
            die($e->getMessage());
        }
        
    }

    public function setAdminEmail($email){
        $this->adminEmail = $email;
    }

    public function getAdminEmail(){
        $this->adminEmail;
    }

    public function getUserInfo(){
        
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE user_id=:userId");
        $sql->bindParam('userId', $this->userId);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){
            foreach($result as $v){
                return $this->result[] = $v;
            }
        }
    }
    
    public function getUserName(){
        $username = $this->getUserInfo();
        $username['username'];
    }
    public function getUserEmail(){
        $email = $this->getUserInfo();
        $email['email'];
    }
    private function message(){
        $data = $this->data;
        $result = [];
        if(!empty($data)){
            foreach($data as $k=>$v){
                $result[$k] = $v;
            }
        }
        $user = $this->getUserInfo();
        $this->message = "<div>";
        $this->message .= "<h4>" . $user['username'] . "</h4>";
        $this->message .= "<span>Has added a new trip to his list</span>";
        $this->message .= "<h5>Trip Details:</h5>";
        $this->message .= "<ul>";
        $this->message .= "<li><strong>Email</strong>: " . $user['email']."</li>";
        $this->message .= "<li><strong>Departure</strong>: " . $result['departure']."</li>";
        $this->message .= "<li><strong>Destination</strong>: " . $result['destination']."</li>";
        $this->message .= "<li><strong>Distance</strong>: " . $result['distance']."</li>";
        $this->message .= "<li><strong>Amount Of Riders</strong>: " . $result['amountofriders']."</li>";
        $this->message .= "<li><strong>Date</strong>: " . $result['date']."</li>";
        $this->message .= "</ul>";
        $this->message .= "<p>Amount in ZAR</p>";
        $this->message .= "<h4>" . $result['price'] . "</h4>";
        $this->message .= "</div>";
        return $this->message;
    }
    private function notify(){
        $user = $this->getUserInfo();
        $message = $this->message();
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'mail.orangecabs.joburg';
        $mail->Port = 465;
        $mail->Username = 'dev@orangecabs.joburg';
        $mail->Password = $this->emailPassword;
        $mail->setFrom($user['email'], $user['username']);
        $mail->addAddress($this->adminEmail, 'Orange Cabs');
        $mail->addAddress($this->adminEmail2, 'Orange Cabs info');
        $mail->addAddress($this->adminEmail3, 'Orange Cabs admin');
        $mail->Subject = $user['username'] . " - " . $this->subject;
        $mail->isHTML(true);
        $mail->Body = $message;
        
        if(!$mail->send()){
            echo 'The notification has not been sent';
            echo 'Mail Error: ' . $mail->ErrorInfo;;
        }else{
            echo 'The nofication has been sent';
        }
    }

    public function dnd($data){
        echo '<pre>';
        var_dump($data); die();
        echo '</pre>';  
    }
}

// $tripDetails = array(
//     'userId'=>74,
//     'departure'=>'Cape Town',
//     'destination'=>'Langa',
//     'distance'=>'23km',
//     'amountofriders'=>3,
//     'nameofonerider'=>'heritier',
//     'price'=>243,
//     'date'=>'10/04/2019',
// );

// $notify = new NotifyAdmin(74, 'Add trip', $tripDetails);


