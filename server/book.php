<?php session_start();


include_once("DB.php");
$GLOBALS['db']=new DB($host,$username,$password,$database);


class book extends DB {
    private $todo;

    public function __construct(){
        $this->todo=$_POST['todo'];
        $this->dispatcher($this->todo);
    }

    public function dispatcher($todo){
        switch($todo){
            case "getAllBooks":
                $this->getAllBooks();
                break;
            case "getBookInfo":
                $this->getBookInfo();
                break;
            case "getBooksNumber":
                $this->getBooksNumber();
                break;
            case "getBooksByPageNumber":
                $this->getBooksByPageNumber();
                break;
            case "getBooksByTitle":
                $this->getBooksByTitle();
                break;



        }
    }



    protected function getAllBooks(){
        $_SESSION['filter']='1=1';
        $sql='select * from books order by id desc limit 9';
        $result=$GLOBALS['db']->db_query($sql);

        $total=array();
        while($row = $GLOBALS['db']->db_assoc($result)){
            array_push($total, $row);
        }
        print(json_encode($total));
    }

    protected function getBookInfo(){
        $book_id=$_POST['id'];
        $sql='select title,bdesc from books where id='.$book_id;
        $result=$GLOBALS['db']->db_query($sql);
        $row = $GLOBALS['db']->db_assoc($result);

        print(json_encode($row));
    }

    protected function getBooksNumber(){
        $sql='select count(id) as numOfBooks from books where '.$_SESSION['filter'] ;
        $result=$GLOBALS['db']->db_query($sql);
        $row = $GLOBALS['db']->db_assoc($result);

        print(json_encode($row));
    }

    protected function getBooksByPageNumber(){
        $pageNum=$_POST['page'];
        $pageNum=abs(intval($pageNum)-1);
        $offset=$pageNum*9;



//        print(json_encode($offset));

        $sql='select * from books where '.$_SESSION['filter'].' order by id desc limit 9 offset '.$offset;
        $result=$GLOBALS['db']->db_query($sql);

        $total=array();
        while($row = $GLOBALS['db']->db_assoc($result)){
            array_push($total, $row);
        }
        print(json_encode($total));
    }


    //start the filter session
    protected function getBooksByTitle(){

        $_SESSION['filter']='title like"%'.$_POST['filter'].'%"';
        $sql='select * from books  where '.$_SESSION['filter'].'  order by id desc limit 9';
        $result=$GLOBALS['db']->db_query($sql);

        $total=array();
        while($row = $GLOBALS['db']->db_assoc($result)){
            array_push($total, $row);
        }
        print(json_encode($total));
    }




}

$book_obj=new book();


?>
