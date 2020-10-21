<?php

$username=$_POST['username'];
$email=$_POST['email'];
$pnumber=$_POST['PhoneNumber'];
$amount=$_POST['amount'];
$purpose='donation';

include 'Instamojo.php';

$api = new Instamojo\Instamojo('test_dba31d3938ba9f88e721a22237e', 'test_c5c9f495cc04bbd26d755bcc7dd', 'https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
		"phone" => $pnumber,
		"allow_repeated_payments" => false,
        "redirect_url" => "https://peacockish-skip.000webhostapp.com/thankyou.php"
        ));
		$pay_url=$response['longurl'];
        header("location:$pay_url");
	}
	catch (Exception $e) {
		print('Error: ' . $e->getMessage());
	}
?>