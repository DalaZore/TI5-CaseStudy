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

    public function updateRate()
    {
        $XML=simplexml_load_file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");


        foreach($XML->Cube->Cube->Cube as $rate)
        {
            if($rate["currency"]=="CHF"||$rate["currency"]=="JPY"||$rate["currency"]=="USD")
            {
                $stmt = $this->conn->prepare("UPDATE currency SET rate=:rate WHERE currency=:currency");
                $stmt->execute(array(':rate'=>$rate["rate"],':currency'=>$rate["currency"]));
            }
        }

    }

    public function getCurrency()
    {
        $stmt = $this->runQuery("SELECT * FROM customer_currency WHERE customer_id=:customer_id");
        $stmt->execute(array(':customer_id'=>$_SESSION['user_session']));
        $currency=$stmt->fetch(PDO::FETCH_ASSOC);
        return $currency['currency'];
    }

    public function getRate()
    {
        $stmt = $this->runQuery("SELECT * FROM customer_currency WHERE customer_id=:customer_id");
        $stmt->execute(array(':customer_id'=>$_SESSION['user_session']));
        $currency=$stmt->fetch(PDO::FETCH_ASSOC);
        $rate = $currency['rate'];
        return $rate;
    }

    public function setCurrency($currency)
    {
        $stmt = $this->runQuery("UPDATE customer SET currency_id=:currency WHERE customer_id=:customer_id");
        $stmt->execute(array(':customer_id'=>$_SESSION['user_session'],':currency'=>$currency));

        return true;
    }




    public function checkShoppingCart($customer_id,$article_id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM shopping_cart WHERE customer_id=:customer_id AND article_id=:article_id");
            $stmt->bindparam(":customer_id", $customer_id);
            $stmt->bindparam(":article_id", $article_id);
            $stmt->execute();
            $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                return true;
            }
            else
            {
                return false;
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

    public function incrementCart($customer_id,$article_id)
    {
        try
        {

            $stmt = $this->conn->prepare("UPDATE shopping_cart SET quantity=quantity+1 WHERE customer_id=:customer_id AND article_id=:article_id");

            $stmt->bindparam(":customer_id", $customer_id);
            $stmt->bindparam(":article_id", $article_id);



            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function addToCart($customer_id,$article_id,$quantity)
    {
        try
        {

            $stmt = $this->conn->prepare("INSERT INTO shopping_cart(customer_id,article_id,quantity) 
		                                               VALUES(:customer_id, :article_id, :quantity)");

            $stmt->bindparam(":customer_id", $customer_id);
            $stmt->bindparam(":article_id", $article_id);
            $stmt->bindparam(":quantity", $quantity);


            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }



    /* User Details */

}
