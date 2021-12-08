<?php



class InputManager{
    
    static function validate($input){
        $data = trim($input);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    static function checkMail($input){
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }
    static function checkPrice($input){
        if($input == ''){
            return true;
        }
        if(filter_var($input, FILTER_VALIDATE_INT)){
            if($input < 100000){
                return true;
            }
        }
        return false;

    }
    static function checkLink($input){
        if($input == ''){
            return true;
        }
        
        return filter_var($input, FILTER_VALIDATE_URL);
    }
    static function checkInput($input){
        if($input == ''){
            return false;
        }
        if(strlen($input) < 2 OR strlen($input) > 255){
            return false;
        }

        return true;
    }
}