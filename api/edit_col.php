<?php include_once "../base.php";

// dd($_POST['id']);
// dd($_POST['sh']);
// dd($_POST); //不會有img，但name的欄位還是要加img

        $do=$_GET['do']; //在傳送表單的尾端?do=帶參數
        // echo $do;

        switch($do){
            case 'add_col':
            case 'edit_col':
            case 'col_status':
                $DB=$Collection;
            break;
        }

        if(isset($_POST['sh'])){
            $col = $DB->find($_POST['id']);
            $col['sh']= ($_POST['sh']==0)?1:0;
            $DB->save($col);
        }else{
            if(!empty($_FILES['img']['tmp_name'])){
                $_POST['img']=$_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_POST['img']);
            }
            $DB->save($_POST);
        }

// if($col['sh']== 0){
//     $col['sh']=1;
// }else{
//     if($col['sh']== 1){
//         $col['sh']=0;
//     }
// }

to("../back2.php?do=pf_collection");

