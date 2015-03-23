<?php session_start();
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 3/12/2015
 * Time: 11:58 PM


 */
include_once("DB.php");
$GLOBALS['db']=new DB($host,$username,$password,$database);

class post extends DB{
    private $todo;
    public function __construct(){
        $this->todo=$_POST['todo'];
        $this->dispatcher($this->todo);

    }
    public function dispatcher($todo)
    {
        switch ($todo) {
            case "addNewPost":
                $this->addpost();
                break;
            case "getPosts" :
                $this->getAllPost();
                break;
            case "getAllCategories":
                $this->getAllCategories();
        }
    }
    protected  function addPost()
    {
     $title_post=$_POST['title_post'];
        $content=$_POST['content_post'];
        $publish_date = date('Y-m-d');
      //  $sql='insert into post(Title,Content,Puplish_Date) VALUES("'.$title_post.'","'.$content.'","'.$publish_date.'")';
        $sql='insert into post(title,content,publishDate) values("'.$title_post.'","'.$content.'","'.$publish_date.'")';
       // $sql='insert into user(User_name,Password,Email,First_name,Last_name,Address,City,Country,Phone) values("'.$username.'","'.$password.'","'.$email.'","'.$firstname.'","'.$lastname.'","'.$address.'","'.$city.'","'.$country.'","'.$phone.'")';


        $GLOBALS['db']->db_query($sql);
    }

    // show all post

    protected function getAllPost(){
        $_SESSION['filter']='1=1';
        $sql='select * from post order by postId ';
        $result=$GLOBALS['db']->db_query($sql);

        $total=array();
        while($row = $GLOBALS['db']->db_assoc($result)){
            array_push($total, $row);
        }
        print(json_encode($total));
    }

    protected function getAllCategories()
    {
        $sql='select * from category';
        $result=$GLOBALS['db']->db_query($sql);

        $total=array();
        while($row = $GLOBALS['db']->db_assoc($result)){
            array_push($total, $row);
        }
        print(json_encode($total));

    }


}
$post_ob=new post();