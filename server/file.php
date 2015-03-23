<?php session_start();

include_once("DB.php");
$GLOBALS['db']=new filesUp_DB($host,$username,$password,$database);


$date = date('Y/m/d');
$date_arr=explode('/',$date);
$current_date=($date_arr[0]*360)+($date_arr[1]*30)+$date_arr[2];


$user_id='0';
if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
}




function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}


//if (!file_exists('path/to/directory')) {
//    mkdir('path/to/directory', 0777, true);
//}

//ajax variables
$title=$_POST['title'];
$content=$_POST['content'];
$folder_name=$_POST['folder'];
$isPrivate=$_POST['private'];
if(!isset($isPrivate)){
    $isPrivate='public';
}
$password=$_POST['folder_password'];
if(!isset($password)){
    $password='0';
}

$upload_dir = "../uploads/".$folder_name."/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}


if (isset($_FILES["myfile"])) {
    $no_files = count($_FILES["myfile"]['name']);
    for ($i = 0; $i < $no_files; $i++) {

        if ($_FILES["myfile"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["myfile"]["error"][$i] . "<br>";
        } else {
            $rnd=randomNumber(7);
            $fname=$upload_dir .$rnd.'_'.$_FILES["myfile"]["name"][$i];
            move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $fname);
            echo "<div class='well col-xs-4 col-xs-offset-4'>".$_FILES["myfile"]["name"][$i] . "</div>";
            $sql = 'insert into files(short_key,long_key,title,content,user_id,date_num,folder_name,is_private) values("' .$password.'","'. $fname . '","' . $title . '","' . $content . '",' . $user_id . ',' . $current_date .',"'.$folder_name.'","'.$isPrivate.'")';
            $GLOBALS['db']->db_query($sql);
        }
    }
//    echo " Files Uploaded Successfully!<br>";
}






?>