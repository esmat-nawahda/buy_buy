<?php session_start();
/**
 * Created by PhpStorm.
 * User: GeniuCode Pointer
 * Date: 2/1/2015
 * Time: 1:41 PM
 */

include_once("DB.php");
$GLOBALS['db']=new filesUp_DB($host,$username,$password,$database);
$GLOBALS['upload_dir']="uploads/";

class files  extends filesUp_DB {
    private $todo;

    public function __construct(){
        $this->todo=$_POST['todo'];
        $this->dispatcher($this->todo);
    }

    public function dispatcher($todo){
        switch($todo){
            case "getMyFiles":
                $this->getMyFileAsArray();
                break;
            case "getMyFolders":
                $this->getMyfoldersAsArray();
                break;
            case "showFiles":
                $this->showFilesByUrl();
                break;
            case "delete":
                $this->deleteFile();
                break;
            case "deleteFolder":
                $this->deleteFolder();
                break;
            case "getPassword":
                $this->getPassword();
                break;



        }
    }

    protected function deleteFile(){
        $user_id=$_SESSION['user_id'];
        $file_id=$_POST['id'];
        $rows=array();
        $sql='delete from files where id='.$file_id;
        $result=$GLOBALS['db']->db_query($sql);

        if($result){
            print("Success");
        }
        else{
            print("ERROR");
        }
    }

    protected function deleteFolder(){
        $user_id=$_SESSION['user_id'];
        $folder_name=$_POST['id'];
        $rows=array();
        $sql='delete from files where folder_name="'.$folder_name.'"';
        $result=$GLOBALS['db']->db_query($sql);

        if($result){
            print("Success");
        }
        else{
            print("ERROR");
        }
    }


    protected function getMyFileAsArray(){
        $user_id=$_SESSION['user_id'];
        $rows=array();
        $sql='select * from files where user_id='.$user_id.' order by date_num desc';
        $result=$GLOBALS['db']->db_query($sql);

        $totalView="";
        while($row = $GLOBALS['db']->db_assoc($result)){
            $file=$this->buildFilesView($row);
            $totalView.=$file;
        }
        print($totalView);
    }





    private function buildFilesView($file){
        $id=$file["id"];
        $url=$GLOBALS['upload_dir'].$file["long_key"];
        $title=$this->trim_text($file["title"],8);
        $content=$this->trim_text($file["content"],30);

        $html='<div class="col-md-3 col-sm-6 col-xs-12"  id='.$id.'>';
        $html.='<div class="feature">';
        $html.='<a class="fileShow"><i class="fa fa-file-archive-o fileShow" id='.$id.'></i></a>';

        $html.='<div class="feature-content">';
        $html.='<h4>'.$title.'</h4>';
        $html.='<p>'.$content.'</p>';
        $html.='<a style="cursor: pointer;" href="'.$url.'"><div>DOWNLOAD</div></a>';
        $html.='<div style="cursor: pointer;" class="glyphicon glyphicon-floppy-remove deleteFile" id='.$id.'>DELETE</div>';

        $html.='</div>';
        $html.='</div>';
        $html.='</div><!-- /.col-md-3 -->';

        return $html;
    }



    protected function showFilesByUrl(){
        $user_id=$_SESSION['user_id'];
        $folder_name=$_POST['url'];
        $rows=array();
        $sql='select * from files where user_id='.$user_id.' and folder_name="'.$folder_name.'" order by date_num desc';
        $result=$GLOBALS['db']->db_query($sql);

        $totalView='<center><div style="font-size: larger; cursor: pointer;" class="well col-xs-12" id="back_1">Back</div></center>';
        while($row = $GLOBALS['db']->db_assoc($result)){
            $file=$this->buildFilesView($row);
            $totalView.=$file;
        }
        print($totalView);
    }


    ///Folders
    protected function getMyFoldersAsArray(){
        $user_id=$_SESSION['user_id'];
        $rows=array();
        $sql='SELECT DISTINCT folder_name from files where user_id='.$user_id.' order by date_num desc';
        $result=$GLOBALS['db']->db_query($sql);

        $totalView="";
        while($row = $GLOBALS['db']->db_assoc($result)){
            $file=$this->buildFoldersView($row);
            $totalView.=$file;
        }
        print($totalView);
    }


    private function buildFoldersView($folder){
        $folder_name=$folder["folder_name"];
        $url=$folder_name;

        $html='<div class="col-md-3 col-sm-6 col-xs-12"  id='.$url.'>';
        $html.='<div class="feature">';
        $html.='<a class="fileShow"><i class="fa fa-folder-open-o fileShow"  id='.$url.'></i></a>';

        $html.='<div class="feature-content">';
        $html.='<h4>'.$folder_name.'</h4>';
        $html.='<a style="cursor: pointer;" href="#"  id='.$url.' class="openFolder privacy"><div>OPEN</div></a>';
        $html.='<div style="cursor: pointer;" class="glyphicon glyphicon-floppy-remove deleteFolder" id='.$url.'>DELETE</div>';

        $html.='</div>';
        $html.='</div>';
        $html.='</div><!-- /.col-md-3 -->';

        return $html;
    }


    function trim_text($input, $length, $ellipses = true, $strip_html = true) {
        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }

        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        $trimmed_text = substr($input, 0, $last_space);

        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= '...';
        }

        return $trimmed_text;
    }


    protected function getPassword(){
        $user_id=$_SESSION['user_id'];

        $sql='select short_key from files where folder_name="'.$_POST['url'].'"';
        $result=$GLOBALS['db']->db_query($sql);

        $totalView="";
        $row = $GLOBALS['db']->db_assoc($result);


        return($row['short_key']);
    }


}

$user_ob=new files();
?>

<script>
    $('.desc').hide();
    $('body').on('click', '.fileShow', function() {

        var id = $(this).attr('id');
        var idd=".desc"+id;
        $(idd).show();
//        console.log(idd);
    });


    $(".deleteFile").click(function(){
        var id = $(this).attr('id');
//        console.log(id);
        var data="id="+id+"&todo=delete";
        swal({
                title: "Are you sure?",
                text: "Delete!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                closeOnConfirm: false },
            function(){

                $.ajax({
                    type: "POST",
                    url: 'server/files.php',
                    data: data, // appears as $_GET['id'] @ ur backend side
                    success: function (data) {
                        // data is ur summary
                        //                        $('#Edit').html(data);


                        swal("Done!", "Your have been deleted from your repository successfully.", "success");
                        $('#files_container').find('#'+id).remove();

                    }
                });
            }
        );
    });


    //open folder
    function openFolder(url){

        var data="url="+url+"&todo=showFiles";
        $.ajax({
            type: "POST",
            url: 'server/files.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
                // data is ur summary
                //                        $('#Edit').html(data);


                $('#files_container').html(data);

            }
        });
    }
    $('body').on('click', '.openFolder', function() {
        var url = $(this).attr('id');
//        console.log(url);
//        var data="url="+url+"&todo=getPassword";
//        $.ajax({
//            type: "POST",
//            url: 'server/files.php',
//            data: data, // appears as $_GET['id'] @ ur backend side
//            success: function (data) {
//                // data is ur summary
//                //                        $('#Edit').html(data);
//
//
//                console.log(data);
//
//            }
//        });
        openFolder(url);
    });

    $('body').on('click', '#back_1', function() {

        var data="todo=getMyFolders";
        $('#files_container').html('');
        $.ajax({
            type: "POST",
            url: 'server/files.php',
            data: data, // appears as $_GET['id'] @ ur backend side
            success: function (data) {
//                alert(data);
                $('#files_container').html(data);
            }
        });

    });



    $(".deleteFolder").click(function(){
        var id = $(this).attr('id');
//        console.log(id);
        var data="id="+id+"&todo=deleteFolder";
        swal({
                title: "Are you sure?",
                text: "Delete!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                closeOnConfirm: false },
            function(){

                $.ajax({
                    type: "POST",
                    url: 'server/files.php',
                    data: data, // appears as $_GET['id'] @ ur backend side
                    success: function (data) {
                        // data is ur summary
                        //                        $('#Edit').html(data);


                        swal("Done!", "Your have been deleted from your repository successfully.", "success");
                        $('#files_container').find('#'+id).remove();

                    }
                });
            }
        );
    });


    $('body').on('click', '.privacy', function() {
        var id = $(this).attr('id');
//        alert(id);
//        var data="todo=getMyFolders";
//        $('#files_container').html('');
//        $.ajax({
//            type: "POST",
//            url: 'server/files.php',
//            data: data, // appears as $_GET['id'] @ ur backend side
//            success: function (data) {
////                alert(data);
//                $('#files_container').html(data);
//            }
//        });

    });


</script>