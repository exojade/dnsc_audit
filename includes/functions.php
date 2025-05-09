<?php
    require_once("constants.php");
     function to_peso($number){
        if($number != ""){
            return("₱ " .number_format($number, 2, '.', ','));
        }
        else
        return($number);
    }
    function getRandomColor() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    function asset($path)
{
    // Get the server's base URL dynamically
    $base_url = sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http',
        $_SERVER['HTTP_HOST'],
        rtrim(dirname($_SERVER['SCRIPT_NAME']), '/')
    );

    // Return the full URL to the asset
    return $base_url . '/' . ltrim($path, '/');
}

function addNotification($receiver_id, $message, $sender_id){
    query("insert INTO notification (receiver_id, message, created, sender_id) 
        VALUES(?,?,?,?)", 
    $receiver_id, $message, time(), $sender_id);
}

function getMonths(){
    $months = [
        ["id" => 1, "name" => "Jan"],
        ["id" => 2, "name" => "Feb"],
        ["id" => 3, "name" => "Mar"],
        ["id" => 4, "name" => "Apr"],
        ["id" => 5, "name" => "May"],
        ["id" => 6, "name" => "Jun"],
        ["id" => 7, "name" => "Jul"],
        ["id" => 8, "name" => "Aug"],
        ["id" => 9, "name" => "Sep"],
        ["id" => 10, "name" => "Oct"],
        ["id" => 11, "name" => "Nov"],
        ["id" => 12, "name" => "Dec"],
    ];
    return $months;
        }




function base_url()
{
    // Dynamically generate the base URL based on the current server setup
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); // Get the root path of the project

    return $protocol . '://' . $host . $path;  // Example: http://localhost:8080/dnsc_audit
}

    function generateMonthArray($from, $to) {
        $from = max(1, min(12, (int)$from)); // Ensure $from is between 1 and 12.
        $to = max(1, min(12, (int)$to));     // Ensure $to is between 1 and 12.
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
    
        $result = [];
        for ($i = $from - 1; $i < $to; $i++) {
            $result[] = $months[$i];
        }
    
        return $result;
    }

    function convertBrgytoNumber($barangay){
        // Define an associative array mapping barangay names to numbers
        $barangayMap = array(
            "A. O. Floirendo" => 1,
            "Datu Abdul Dadia" => 2,
            "Buenavista" => 3,
            "Cacao" => 4,
            "Cagangohan" => 5,
            "Consolacion" => 6,
            "Dapco" => 7,
            "Gredu (Poblacion)" => 8,
            "J.P. Laurel" => 9,
            "Kasilak" => 10,
            "Katipunan" => 11,
            "Katualan" => 12,
            "Kauswagan" => 13,
            "Kiotoy" => 14,
            "Little Panay" => 15,
            "Lower Panaga (Roxas)" => 16,
            "Mabunao" => 17,
            "Maduao" => 18,
            "Malativas" => 19,
            "Manay" => 20,
            "Nanyo" => 21,
            "New Malaga (Dalisay)" => 22,
            "New Malitbog" => 23,
            "New Pandan (Pob.)" => 24,
            "New Visayas" => 25,
            "Quezon" => 26,
            "Salvacion" => 27,
            "San Francisco (Poblacion)" => 28,
            "San Nicolas" => 29,
            "San Pedro" => 30,
            "San Roque" => 31,
            "San Vicente" => 32,
            "Santa Cruz" => 33,
            "Santo Niño (Poblacion)" => 34,
            "Sindaton" => 35,
            "Southern Davao" => 36,
            "Tagpore" => 37,
            "Tibungol" => 38,
            "Upper Licanan" => 39,
            "Waterfall" => 40
        );
    
        // Convert barangay name to lowercase for case-insensitive comparison
        // $barangayLower = strtolower($barangay);
    
        // Check if the barangay exists in the mapping
        if (isset($barangayMap[$barangay])) {
            return $barangayMap[$barangay];
        } else {
            return null; // Or handle if barangay is not found (optional)
        }
    }

    function timeAgo($timestamp) {
        $time_difference = time() - $timestamp;
      
        if ($time_difference < 1) {
            return 'Just now';
        }
      
        $condition = array( 
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
      
        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;
      
            if ($d >= 1) {
                $t = round($d);
                return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
      }


    function to_peso_with_no_prefix($number){
        if($number != ""){
            return(number_format($number, 2, '.', ','));
        }
        else
        return($number);
    }

    function add_log($activity, $user){

        $log_id = create_uuid("LOG");
        $ip = getIPAddress(); 
        $date = date("Y-m-d G:i:s a");

        if (query("insert INTO tbl_logs (logs_id, action, logs_date, user_id, ip_address, timestamp) 
                    VALUES(?,?,?,?,?,?)", 
                $log_id, $activity, $date, $user, $ip, time()) === false)
				{
					dump("Sorry, that username has already been taken!");
                }
        ;

      
    }

    function getIPAddress() {  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                   $ip = $_SERVER['HTTP_CLIENT_IP'];  
           }  
       elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
       else{  
                $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
   } 

    function dump($variable)
    {
        require("dump.php");
        exit;
    }
	
	function dumper($variable)
    {
        require("../../templates/dump.php");
        exit;
    }
	
	function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
	}

    /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);
				$handle->exec("set names utf8");
				// $handle->exec("set character_set_results='utf8'");
				// $handle->exec("set collation_connection='utf8'");
				// $handle->exec("set character_set_client='utf8'");
                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    function query_etracs(/* $sql [, ... ] */)
        {
            // SQL statement
            $sql = func_get_arg(0);
    
            // parameters, if any
            $parameters = array_slice(func_get_args(), 1);
    
            // try to connect to database
            static $handle;
            if (!isset($handle))
            {
                try
                {
                    // connect to database
                    $handle = new PDO("mysql:dbname=" . DATABASE_ETRACS . ";host=" . SERVER_ETRACS, USERNAME_ETRACS, PASSWORD_ETRACS);
                    $handle->exec("set names utf8");
                    $handle->exec("set character_set_results='utf8'");
                    $handle->exec("set collation_connection='utf8'");
                    $handle->exec("set character_set_client='utf8'");
                    // ensure that PDO::prepare returns false when passed invalid SQL
                    $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
                }
                catch (Exception $e)
                {
                    // trigger (big, orange) error
                    trigger_error($e->getMessage(), E_USER_ERROR);
                    exit;
                }
            }
    
            // prepare SQL statement
            $statement = $handle->prepare($sql);
            if ($statement === false)
            {
                // trigger (big, orange) error
                trigger_error($handle->errorInfo()[2], E_USER_ERROR);
                exit;
            }
    
            // execute SQL statement
            $results = $statement->execute($parameters);
    
            // return result set's rows, if any
            if ($results !== false)
            {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            else
            {
                return false;
            }
        }


    

    function logout()
    {
        // unset any session variables
        $_SESSION["dnsc_audit"] = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        //session_destroy();
		unset($_SESSION["dnsc_audit"]);
    }

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     * 
     * 
     * 
     */

    function strips($data) {
  	  $data = trim($data);
  	  $data = stripslashes($data);
  	  $data = htmlspecialchars($data);
      if(empty($data)) {
        return null;
      }
      else {
        return $data;
      }
  	}



      function removeInlineStyles($html) {
        libxml_use_internal_errors(true); // suppress warnings from malformed HTML
    
        // Ensure valid HTML by wrapping it properly
        $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>' . $html . '</body></html>';
    
        $doc = new DOMDocument();
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
        // Remove all 'style' attributes
        $xpath = new DOMXPath($doc);
        foreach ($xpath->query('//*[@style]') as $el) {
            $el->removeAttribute('style');
        }
    
        // Remove <p> tags but keep their content
        foreach ($xpath->query('//p') as $pElement) {
            $content = '';
            foreach ($pElement->childNodes as $childNode) {
                $content .= $doc->saveHTML($childNode); // Preserve inner HTML
            }
            $pElement->parentNode->replaceChild($doc->createTextNode($content), $pElement); // Replace <p> with its content
        }
    
        // Extract body contents and return HTML without <p> tags
        $body = $doc->getElementsByTagName('body')->item(0);
        $innerHTML = '';
        foreach ($body->childNodes as $child) {
            $innerHTML .= $doc->saveHTML($child);
        }
    
        // Decode any HTML entities back to their original tags
        return html_entity_decode($innerHTML);
    }
    
    // $auditPlan["audit_objectives"] = removeInlineStyles($auditPlan["audit_objectives"]);
    


    function redirect($destination)
    {
		
		
		
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
			
			
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
			
        }



        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
			
			
        }
		
        // exit immediately since we're redirecting anyway
        exit;
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
		
        // if template exists, render it
        // if (file_exists("$template"))
        // {   // {   // {
            // extract variables into local scope
            extract($values);
            // render header
            require("layouts/header.php");
			
			// render sidebar
            require("layouts/sidebar.php");

            // render template
            require("$template");
        // }

        // else err
        // else
        // {
            // trigger_error("Invalid template: $template", E_USER_ERROR);
        // }
    }


    function renderFrontPage($template, $values = [])
    {
            extract($values);
            require("layouts/headerFrontPage.php");
            require("$template");
    }


    function renderview($template, $values = []) {
        extract($values);
        require("$template");
        
    }
	
	function check_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	
	function super_unique($array,$key)
	{
		$temp_array = array();
		foreach ($array as &$v) {
		if (!isset($temp_array[$v[$key]]))
		$temp_array[$v[$key]] =& $v;
			}
		$array = array_values($temp_array);
		return $array;
	}
	
	header('content-type:text/html;charset=utf-8');
	
	


?>
