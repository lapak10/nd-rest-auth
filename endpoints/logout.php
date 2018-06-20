<?php defined('ABSPATH') or exit;


add_action('rest_api_init', function() {
        
        register_rest_route('rest_auth', '/logout', array(
    
            'methods' => 'POST',
            
            'callback' => function( $request ){
    
          
    ND_rest_auth:: delete_valid_token( (int) $request['user_id'] , (string) $request['token'] );

    return new WP_REST_Response( array(
        'success'=>true,
        'msg'=>'token deleted successfully'
        
    ) );
    
   
    
   
    
    }
            
        ));
        
    });