<?php defined('ABSPATH') or exit;


add_action('rest_api_init', function() {
        
        register_rest_route('rest_auth', '/login', array(
    
            'methods' => 'POST',
            
            'callback' => function( $request ){
    
            $user = get_user_by( 'login', $request['username'] );
    
    if ( $user && wp_check_password( $request['password'], $user->data->user_pass, $user->ID) ){
        $data = array(
            'success'=>true
            ,'user_login'=> $request['username']
            ,'user_id'=> $user->ID
            ,'msg'=>'login ok'
            ,'token'=> ND_rest_auth :: get_new_valid_token( $user->ID )
           
        );
    
        return new WP_REST_Response( $data );
    
    }else{
    
    return new WP_REST_Response( array(
        'success'=>false,
        'msg'=>'invalid user name or password',
        'username'=>$request['username'],
        'password'=> $request['password']
    ) );
    
    }
    
    
    }
            
        ));
        
    });


    // add_action('rest_api_init', function() {
        
    //     register_rest_route('rest_auth', '/token_check', array(
    
    //         'methods' => 'POST',
            
    //         'callback' => function( $request ){
    
                
    //         return ND_rest_auth:: delete_valid_token( (int) $request['user_id'] , (string) $request['token'] );
    
    
    // }
            
    //     ));
        
    // });