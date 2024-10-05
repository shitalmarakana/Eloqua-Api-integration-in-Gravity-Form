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
						"id" =>"5042",
						"value" =>rgar( $entry, '13' ),
					),
					array(
						"id" =>"5043",
						"value" =>rgar( $entry, '10.3' ),
					),
					array(
						"id" =>"5044",
						"value" =>rgar( $entry, '10.4' ),
					),
					array(
						"id" =>"5048",
						"value" =>rgar( $entry, '14' ),
					),
					array(
						"id" =>"5047",
						"value" =>rgar( $entry, '11' ),
					),
					array(
						"id" =>"4732",
						"value" =>rgar( $entry, '3' ),
					),
					array(
						"id" =>"5049",
						"value" =>rgar( $entry, '8' ),
					)
				)
	   
        );
		
	/*echo "<pre>";
		
	print_r($body);
	echo "</pre>";*/
	
	
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
