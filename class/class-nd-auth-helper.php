<?php

class ND_auth_helper{

    private static $table_name = 'nd_rest_auth_tokens';

    public static function is_token_valid( $user_id = -1, $token = 'abc'){

        global $wpdb, $table_prefix;

        self :: $table_name = $table_prefix . 'nd_rest_auth_tokens';


        $valid_key = 'valid';
        $count = $wpdb->get_var( $wpdb->prepare( 
            "
                SELECT count(*) 
                FROM ". self :: $table_name . "
                WHERE user_id = %d 
                AND token = %s
                AND status = %s
            ",$user_id,$token,$valid_key
        ) );

        if ( absint( $count ) === 1 ){
            
            return true;

        }else{
            
            return false;
        
        }
        


    }
}