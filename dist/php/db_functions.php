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
  public function logout()
  {
    if(isset($_SESSION['user_session']))
    {
      session_destroy();
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
    if($this->is_loggedin()) {
      $stmt = $this->runQuery("SELECT * FROM customer_currency WHERE customer_id=:customer_id");
      $stmt->execute(array(':customer_id' => $_SESSION['user_session']));
      $currency = $stmt->fetch(PDO::FETCH_ASSOC);
      return $currency['currency'];
    }
    else
    {
      return "EUR";
    }
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

  public function checkout($customer_id)
  {
    try
    {
      $today=date("m/d/Y");
      $date=strtotime($today);
      $next_week = strtotime("+1 Weeks", $date);
      $shipment=date("Y-m-d", $next_week);

      $currate=$this->getRate();

      $stmt1 = $this->conn->prepare("SELECT * FROM shopping_cart WHERE customer_id=:customer_id");
      $stmt1->bindparam(":customer_id", $customer_id);
      $stmt1->execute();

        while($orderReq=$stmt1->fetch(PDO::FETCH_ASSOC))
        {

          $stmt2 = $this->conn->prepare("INSERT INTO orderlist(customer_id,article_id,quantity,shipment,price) 
		                                               VALUES(:customer_id, :article_id, :quantity,:shipment,:price)");



          $stmt2->bindparam(":customer_id", $customer_id);
          $stmt2->bindparam(":article_id", $orderReq['article_id']);
          $stmt2->bindparam(":quantity", $orderReq['quantity']);
          $stmt2->bindparam(":shipment", $shipment);
          $stmt2->bindparam(":price", $orderReq['price']);
          $stmt2->execute();


        }

      $stmt3 = $this->conn->prepare("DELETE FROM shopping_cart WHERE customer_id=:customer_id");
      $stmt3->bindparam(":customer_id", $customer_id);
      $stmt3->execute();
      return true;
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
      $stmt1 = $this->conn->prepare("SELECT * FROM article WHERE article_id=:article_id");
      $stmt1->bindparam(":article_id", $article_id);
      $stmt1->execute();
      $price=$stmt1->fetch(PDO::FETCH_ASSOC);

      $stmt = $this->conn->prepare("INSERT INTO shopping_cart(customer_id,article_id,quantity,price) 
		                                               VALUES(:customer_id, :article_id, :quantity,:price)");

      $stmt->bindparam(":customer_id", $customer_id);
      $stmt->bindparam(":article_id", $article_id);
      $stmt->bindparam(":quantity", $quantity);
      $stmt->bindparam(":price", $price['price']);


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
