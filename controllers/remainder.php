<?php
class Remainder{

	public function going(){
		if(isset($_POST["submit"] )){

			$person = $_POST["person"];
			$event = $_POST["event"];

			$db = DB::getInstance();
			$result_user = $db->prepare("SELECT * FROM subscribe WHERE id_s = :id_s");
            $result_event->bindParam(":id_s", $_POST["id_s"]);
			$result_user->execute();
			$user = $result_user->fetchAll();

			$result_event = $db->prepare("SELECT * FROM event WHERE id_e = :id_e");
			$result_event->bindParam(":id_e", $_POST["id_e"]);
			$result_event->execute();
			$event = $result_event->fetchAll();

			$person = $user["id_s"];
			$event = $event["id_e"];

			$result = $db->prepare("INSERT INTO going (person, event) VALUES (:person, :event)");
			$result->execute(array(':person' => $person, ':event' => $event));

			echo "test";

		}

          $remainder = PostController::getEventById();

		if($event["event"] == "4" && $user["person"] == "?"){

			require 'vendor/autoload.php';

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'yourclique1@gmail.com';    // SMTP username
                $mail->Password = 'Yourclique1234';                      // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('yourclique1@gmail.com','ExitFestival');
                $mail->addAddress($email);     // Add a recipient              


                //Content
                $mail->isHTML(false);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = "Hello, it is" .date(' d/m/Y H:i:s') . "\n" . "Tomorrow you fave an event!" ;

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
            	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }

    }

}
?>