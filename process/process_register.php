<?php
if(isset($_POST['btnSubmit']) && $_POST['email'])
{
    require "db.php"; //goi lai ketnoi database
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");

    //xuli ket qua
    if(mysqli_num_rows($result) <= 0) //kiem tra dc mail da dc su dung chua
    {
        $token = md5($_POST['email']).rand(10,9999);  // giai thuat md5 sinh chuoi random dc bam
        //save info dk
        $ho = $_POST['ho'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(ho, ten, email, email_verification_link, password) VALUES('$ho', '$ten', '$email', '$token', '$pass')";

        mysqli_query($conn, $sql);
        
        
        $link = "<a href='http://localhost/Hahalolo/process/verify_email.php?key=".$email."&token=".$token."'>Nhấp vào đây để kich hoạt tài khoản</a>";



        //qt gui mail xac nhan
        include "send_mail.php";
        if(sendEmailForAccountAcctive($email, $link)){
            echo "Vui lòng kiểm tra hộp thư của bạn để kích hoạt tài khoản";
        }else{
            echo "Đã có lỗi xảy ra, vui lòng kiểm tra lại thông tin tài khỏan";
        }
    }
}
?>