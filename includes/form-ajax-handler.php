<?php
add_action( 'wp_ajax_request_form', 'request_form' );
add_action( 'wp_ajax_nopriv_request_form', 'request_form' );
function request_form(){
	// $response = array(
	// 	'message' => 'yes'
	// );

	// echo json_encode($response);
	echo $_POST['f-name'];
	die();
}
?>