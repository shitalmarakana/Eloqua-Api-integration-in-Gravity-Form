<?php
add_action( 'gform_after_submission_1', 'post_to_third_party', 10, 2 );
function post_to_third_party( $entry, $form ) {
 
    $endpoint_url = 'https://secure.p03.eloqua.com/api/REST/2.0/data/form/380';
    $body = array(
				"id" => "380",
				"fieldValues" =>array( 
					array(
						"id" => "4729",
						"value" =>rgar( $entry, '1.3' ),
					),
					array(
						"id" =>"4730",
						"value" => rgar( $entry, '1.6' ),
					),
					array(
						"id" =>"4731",
						"value" =>rgar( $entry, '2' ),
					),
					array(
						"id" =>"4732",
						"value" =>rgar( $entry, '3' ),
					)
				)
	   
        );
    GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );
 
	$args = array(
        'method' => 'POST',
        'headers' => array(
            'Authorization' => 'Basic T3ZlcmhlYWREb29yQ29ycG9yYXRpb25cRWxvcXVhLkFQSTpFbDBxdTQhQVAx',
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode($body)
    );
	
    $response = wp_remote_post( $endpoint_url, $args );	
    GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );
}

?>


<?php

add_action( 'gform_after_submission_1', 'post_to_third_party', 10, 2 );
function post_to_third_party( $entry, $form ) {
 
    $endpoint_url = 'https://secure.p03.eloqua.com/api/REST/2.0/data/form/380';
    $body = array(
        'firstName' => rgar( $entry, '1.3' ),
        'lastName' => rgar( $entry, '1.6' ),
        'email' => rgar( $entry, '2' ),
		'comments' => rgar( $entry, '3' ),
        );
	
    /*GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );*/
	
	$body = wp_json_encode( $body ); 
	
	$args = array(
        'method' => 'POST',
        'headers' => array(
            'Authorization' => 'Basic T3ZlcmhlYWREb29yQ29ycG9yYXRpb25cRWxvcXVhLkFQSTpFbDBxdTQhQVAx',
            'Content-Type' => 'application/json',
        ),
        'body' => $body,		
    );
	
	/*echo "<pre>";
	print_r($entry);
	echo "</pre>";
	
	echo "<pre>";
	print_r($args);
	echo "</pre>";*/
	
    $response = wp_remote_post( $endpoint_url, $args );	

	
	// error check
/*if ( is_wp_error( $response ) ) {
   $error_message = $response->get_error_message();
   echo "Something went wrong: $error_message";
}
else {
   echo 'Response: <pre>';
   print_r( $response );
   echo '</pre>';
}*/
	
	
    GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );
}
?>
