<?php
If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
	die();
}
require ('../vendor/autoload.php');

$options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'a8e658b5bb5b6237d6f1',
    '85089a84842a7813f9f3',
    '645188',
    $options
  );

  

    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
    }
    else
    {
        $name = "Client";
    }

    $data['message'] = $name;
  $pusher->trigger('my-channel', 'my-event', $data);
?>