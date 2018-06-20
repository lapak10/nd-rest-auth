<?php

class ND_rest_auth{
    

    private static $table_name = 'nd_rest_auth_tokens';


    public static function create_table(){
        
        global $wpdb,$table_prefix;

        self :: $table_name = $table_prefix . self :: $table_name;

        if( $wpdb->get_var( "show tables like ' self :: $table_name'" ) !=  self :: $table_name ) {

            $sql = "CREATE TABLE `".  self :: $table_name . "` ( ";
            $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
            $sql .= "  `user_id`  varchar(20)   NOT NULL, ";
            $sql .= "  `token`  varchar(50)   NOT NULL, ";
            $sql .= "  `status`  varchar(50)   NOT NULL, ";
            $sql .= "  PRIMARY KEY `order_id` (`id`) "; 
            $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
    
        }


    }

    public static function remove_table(){
        
        global $wpdb,$table_prefix;

        self :: $table_name = $table_prefix . self :: $table_name;

        $sql = "DROP TABLE IF EXISTS ". self :: $table_name .";";
        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        dbDelta($sql);
        //$wpdb->query($sql);


    }

    public static function get_new_valid_token( $user_id = -1 ){
        global $wpdb,$table_prefix;

        self :: $table_name = $table_prefix . self :: $table_name;


        if( $user_id === -1 ){
            return false;
        }

        $token = wp_generate_password(43,false,false);
    
        $wpdb->insert( 
            self :: $table_name, 
            array( 
                'token' => $token, 
                'status' => 'valid',
                'user_id'=> $user_id
            ), 
            array( 
                '%s', 
                '%s',
                '%d' 
            ) 
        );
    
        return $token;
    
    }



    public function delete_valid_token($user_id = -1, $token = 'abc'){

        global $wpdb,$table_prefix;

        self :: $table_name = $table_prefix . self :: $table_name;


        $wpdb->delete( self :: $table_name ,  array( 'user_id' => $user_id,'token'=>$token ), array( '%d','%s' ) );

        return $wpdb->insert_id;

    }


}