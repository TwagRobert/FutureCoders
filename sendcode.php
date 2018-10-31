<?php
	include("config.php");
	ob_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST["email"])) {
			$to = $_POST["email"];
			$subject = 'Password reset code';
			$from_user = "KLAB Coders";
			$from_email = "server.email.forwarder@gmail.com";
			date_default_timezone_set('Etc/UTC');

			require 'PHPMailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 2;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'server.email.forwarder@gmail.com';                 // SMTP username
			$mail->Password = 'Peaceall236@';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom($from_email, $from_user);
			$mail->addAddress($to, "KLab mentor");     // Add a recipient
			$mail->addReplyTo($from_email, $from_user);
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;
			$nber = rand(1000, 9999);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$sql = "insert into confirm values('$email', $nber, 1) ";
			$result = mysqli_query($db,$sql);
			if  ($result == True) {
				$mail->Body    = '<p>Code: '.$nber.'</p>';
				$mail->AltBody = 'Code: '.$nber;
				$c = $mail -> send();

				if($c == False) {
				    echo 'Message has not been sent';
				} else {
				    echo 'Message sent <a href="passwordreset.php"> reset password</a>';
				header("location: passwordreset.php");
				}
			}
	}

?>
