<?php
require_once("dbconnect.php");
class userClass
{

    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    /* User Login */

    public function userLogin($uname,$umail,$upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT customer_id, username, email, pass FROM customer WHERE username=:uname OR email=:umail ");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                if(password_verify($upass, $userRow['pass']))
                {
                    $_SESSION['user_session'] = $userRow['customer_id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /* User Registration */
    public function userRegistration($username,$email,$password,$gname,$surname,$address,$plz,$city)
    {
        try
        {
            $new_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO customer(username,email,pass,gname,surname,address,plz,city) 
		                                               VALUES(:uname, :umail, :upass, :ugivename, :usurname,:uaddress,:uplz,:ucity)");

            $stmt->bindparam(":uname", $username);
            $stmt->bindparam(":umail", $email);
            $stmt->bindparam(":upass", $new_password);
            $stmt->bindparam(":ugivename", $gname);
            $stmt->bindparam(":usurname", $surname);
            $stmt->bindparam(":uaddress", $address);
            $stmt->bindparam(":uplz", $plz);
            $stmt->bindparam(":ucity", $city);


            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }



    /* User Details */
    public function userDetails($customer_id)
    {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT email,username,gname FROM customer WHERE customer_id=:customer_id");
            $stmt->bindParam("customer_id", $customer_id,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}
?>