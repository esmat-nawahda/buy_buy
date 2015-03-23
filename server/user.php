<?php session_start();
/**
 * Created by PhpStorm.
 * User: GeniuCode Pointer
 * Date: 2/1/2015
 * Time: 1:41 PM
 */

include_once("DB.php");
$GLOBALS['db']=new DB($host,$username,$password,$database);

class user extends DB {
    private $todo;

    public function __construct(){
        $this->todo=$_POST['todo'];
        $this->dispatcher($this->todo);
    }

    public function dispatcher($todo){
        switch($todo){
            case "register":
                $this->addNewUser();
            break;
            case "login":
                $this->userLogin();
            break;
            case "logout":
                $this->userLogout();
            break;
            case "getMyData":
                $this->getMyData();
            break;
            case "update":
                $this->updateMyData();
            break;

        }
    }

    protected function addNewUser(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $country=$_POST['country'];
        $phone=$_POST['phone'];


        $sql='insert into user(userName,password,email,firstName,lastName,address,city,country,phone) values("'.$username.'","'.$password.'","'.$email.'","'.$firstname.'","'.$lastname.'","'.$address.'","'.$city.'","'.$country.'","'.$phone.'")';
//        var_dump($sql);
        $GLOBALS['db']->db_query($sql);
    }

    protected function userLogin(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql='select * from user where userName="'.$username.'" and password="'.$password.'"';
        $result=$GLOBALS['db']->db_query($sql);


        if($GLOBALS['db']->db_query_rowsnum($result)>0) {
            $row = $GLOBALS['db']->db_assoc($result);
            $_SESSION['userId']=$row['id'];

            $_SESSION['userName']=$row['userName'];
            print(json_encode($row));
        }
        else{
            print "ERROR";
        }
    }

    protected function userLogout(){
            unset($_SESSION['userId']);
            unset($_SESSION['userName']);
    }


    protected function getMyData(){
        $user_id=$_SESSION['user_id'];
        $sql='select * from user where id='.$user_id;
        $result=$GLOBALS['db']->db_query($sql);
        $row = $GLOBALS['db']->db_assoc($result);

        print(json_encode($row));
    }

    protected function updateMyData(){
        $user_id=$_SESSION['user_id'];

        $username=$_POST['username'];
        $password=$_POST['password'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $bdate=$_POST['bod'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];

        $sql='update user set username="'.$username.'",password="'.$password.'",firstname="'.$firstname.'",lastname="'.$lastname.'",bdate="'.$bdate.'",phone="'.$phone.'",email="'.$email.'" where id='.$user_id;
        $result=$GLOBALS['db']->db_query($sql);
        if($result) {
            print("SUCCESS");
        }else{
            print("ERROR");
        }
    }


}

$user_ob=new user();


?>
