<?php
    if(isset($_POST["submit"])) {
        // process form data, send email, output message
     
        // $str = "rasamautau";
        // $key = "blog";
    
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $key = $_POST["keytext"];
        
        // printf("Text: %s\n", $str);
        // printf("key:  %s\n", $key);
        
        $cod = encipher($user, $key, true); 
        $result = $cod;
        $pww = encipher($pass, $key, true); 
        $hasil = $pww;
        // printf("Code: %s\n", $cod);
    
        // $dec = encipher($cod, $key, false); printf("Back: %s\n", $dec);
    
        // printf("ord:  %s\n", ord('B'));
        // printf("ord:  %s\n", ord('A'));
    
     }
    
     function encipher($src, $key, $is_encode)
        {
            $key = strtoupper($key);
            $src = strtoupper($src);
            $dest = '';
        
            /* strip out non-letters */
            for($i = 0; $i <= strlen($src); $i++) {
                $char = substr($src, $i, 1);
                if(ctype_upper($char)) {
                    $dest .= $char;
                }
            }
        
            for($i = 0; $i <= strlen($dest); $i++) {
                $char = substr($dest, $i, 1);
                if(!ctype_upper($char)) {
                    continue;
                }
                $dest = substr_replace($dest,
                    chr (
                        ord('A') +
                        ($is_encode
                        ? ord($char) - ord('A') + ord($key[$i % strlen($key)]) - ord('A')
                        : ord($char) - ord($key[$i % strlen($key)]) + 26
                        ) % 26
                    )
                , $i, 1);
            }
        
            return $dest;
        }
 
?>