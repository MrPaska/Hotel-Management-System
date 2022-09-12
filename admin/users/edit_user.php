<?php
 include('../links/db_connect.php');

 if (isset($_POST['save_edit'])) {

     $e_role = $_POST['e_role'];

     $sql1 = "SELECT Role_ID FROM roles WHERE Role_Name = '$e_role'";
     $result = mysqli_query($conn, $sql1);
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           $role = $row['Role_ID'];
        }
            $edit_id = $_POST['edit_id'];
            $e_user = $_POST['e_user'];
            $e_surname = $_POST['e_surname'];
            $e_user_name = $_POST['e_user_name'];
            $e_password = sha1($_POST['e_password']);

            $e_email = $_POST['e_email'];

        $sql = "UPDATE users SET Name='$e_user', Surname='$e_surname', Role_ID='$role', User_Name='$e_user_name', Password = '$e_password', Email='$e_email' WHERE User_ID='$edit_id'";
        $query = mysqli_query($conn, $sql);

         if ($query) {
            echo("<script>alert('Vartotojo duomenys sėkmingai pakeisti')</script>");
                echo("<script>window.location = 'users.php';</script>");
     }
         else{
            echo("<script>alert('Oops...')</script>");
                echo("<script>window.location = 'users.php';</script>");
     }
           
    }
    else{
        echo("<script>alert('Neteisingai įvesta rolė. Tokios rolės nėra!')</script>");
            echo("<script>window.location = 'users.php';</script>");

    }   
     
 }
?>