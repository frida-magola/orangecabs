<?php
// Construct variables 
$cartTotal = $_GET['amount'];// This amount needs to be sourced from your application
$data = array(
    // Merchant details
    'merchant_id' => '10000100',
    'merchant_key' => '46f0cd694581a',
    'return_url' => 'http://www.yourdomain.co.za/thank-you.html',
    'cancel_url' => 'http://www.yourdomain.co.za/cancelled-transction.html',
    'notify_url' => 'http://www.yourdomain.co.za/itn.php',
    // Buyer details
    'name_first' => 'First Name',
    'name_last'  => 'Last Name',
    'email_address'=> 'valid@email_address.com',
    // Transaction details
    'm_payment_id' => $_GET['trip_id'], //Unique payment ID to pass through to notify_url
    // Amount needs to be in ZAR
    // If multicurrency system its conversion has to be done before building this array
    'amount' => number_format( sprintf( "%.2f", $cartTotal ), 2, '.', '' ),
    'item_name' => 'Your ride',
    'item_description' => 'Your ride from $origine to $destination',
    'custom_int1' => '9586', //custom integer to be passed through           
    'custom_str1' => 'custom string is passed along with transaction to notify_url page'
);        
echo $data['amount'];
echo $data['trip_id'];
// Create GET string
$pfOutput = '';
foreach( $data as $key => $val )
{
    if(!empty($val))
     {
        $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
     }
}
// Remove last ampersand
$getString = substr( $pfOutput, 0, -1 );
//Uncomment the next line and add a passphrase if there is one set on the account 
//$passPhrase = '';
if( isset( $passPhrase ) )
{
    $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
}   
$data['signature'] = md5( $getString );