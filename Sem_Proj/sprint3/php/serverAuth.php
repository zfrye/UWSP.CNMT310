<?php

require_once("../class/DB.class.php");

$returnData = array();

if (isset($_POST["data"]))
{
    $decodeCreds = json_decode($_POST["data"], true);

    if (count($decodeCreds) == 0)
    {
        $returnData += array("Error" => "Data array is empty.");
    }
    else
    {
        if ((isset($decodeCreds["username"]) && checkEmpty($decodeCreds["username"])) && (isset($decodeCreds["password"]) && checkEmpty($decodeCreds["password"])))
        {
            // Create DB Object
            $db = new DB();

            // Test Connection
            if (!$db->getConnStatus()) {
                Print json_encode(array("Error" => "An Error has occured with the connection.");
            }

            // Sanitize Username and Password
            $sanUsername = $db->dbEsc($decodeCreds["username"]);
            $sanPassword = $db->dbEsc($decodeCreds["password"]);

            // Set query string to retrive User and Role for given Username
            $query = "SELECT role.rolename,user.userpass,user.userstatus,user.realname,user.email FROM role,user2role,user WHERE username = '$sanUsername' AND user.id = user2role.userid AND role.id = user2role.roleid";

            // Run query
            $result = $db->dbCall($query);

            //Print error if failed query
            if(!$result){
                Print json_encode(array("Error" => "Bad Username or Password.");
                goto site;
            }

            if (password_verify($sanPassword, $result[0]["userpass"]))
            {
                $returnData += array("isLoggedIn" => true);

                foreach($result as $entry)
                {
                    if ($entry["rolename"] == "admin")
                    {
                        $returnData += array("isAdmin" => true);
                    }
                }

                $fullname = $result[0]["realname"];

                $names = explode(" ", $fullname);

                $returnData += array("Name" => $names[0]);

                $returnData += array("Email" => $result[0]["email"]);

                Print json_encode($returnData);
            }
            else
            {
                Print json_encode(array("Error" => "Bad Username or Password.");
            }
        }
        else
        {
            Print json_encode(array("Error" => "Please enter both a Username and Password.");
        }
    }

}
else
{
    Print json_encode(array("Error" => "Data array is not set."));
}

?>