<?php
function GuiMail(){   
  require "PHPMailer-master/src/PHPMailer.php"; 
  require "PHPMailer-master/src/SMTP.php"; 
  require 'PHPMailer-master/src/Exception.php'; 
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
  try {
      $mail->SMTPDebug = 2; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
      $mail->isSMTP();  
      $mail->CharSet  = "utf-8";
      $mail->Host = 'smtp.gmail.com';  //SMTP servers
      $mail->SMTPAuth = true; // Enable authentication
      $mail->Username = 'daminhieu1703@gmail.com'; // SMTP username
      $mail->Password = 'Daminhieu1732';   // SMTP password
      $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
      $mail->Port = 465;  // port to connect to                
      $mail->setFrom('daminhieu1703@gmail.com', 'Daminh Hieu' ); 
      $mail->addAddress('hieudmph14827@fpt.edu.vn', 'Đàm Minh Hiếu PH 1 4 8 2 7'); //mail và tên người nhận  
      $mail->isHTML(true);  // Set email format to HTML
      $mail->Subject = 'Thư gửi từ form liên hệ';
      $noidungthu = '<p>Chào bạn !<hr>chúc an lành</p>'; 
      $mail->Body = $noidungthu;
      $mail->smtpConnect( array(
          "ssl" => array(
              "verify_peer" => false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
          )
      ));
      $mail->send();
      echo 'Đã gửi mail xong';
  } catch (Exception $e) {
      echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
  }
}//function GuiMail
?>
<?php
GuiMail();
?>