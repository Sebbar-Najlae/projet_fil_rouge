<?php
require_once('../model/email.php');

class emailsManager {

	public function getList(){
		$dbh = new PDO("mysql:host=localhost;dbname=remyurda","root","");
		$stack = array(); 
		// $req = "SELECT * FROM recipient WHERE dateSend=CURDATE()";
		$req = "SELECT * FROM recipient";
		$result = $dbh->query($req)->fetchAll();
		foreach ($result as $row){
			$item = new Email();
			$item->setId($row["id"]);
			$item->setEmail($row["email"]);
			$item->setSubject($row["subject"]);
			// $item->setBody($row["body"]);
			// $item->setDate($row["dateSend"]);
			array_push($stack, $item);
		}
		return $stack;

	}
//Add email
		public function add($email){
			$dbh = new PDO("mysql:host=localhost;dbname=remyurda","root","");
			$req = "INSERT INTO `recipient`(`id`,`email`, `subject`,`body`,`dateSend`) VALUES (:id,:email,:subject,:body,:dateSend)";

			$updateemailQuery = $dbh ->prepare($req);
			$updateemailQuery -> bindParam(":id",$email->getId(),PDO::PARAM_STR);	
			$updateemailQuery -> bindParam(":email",$email->getEmail(),PDO::PARAM_STR);
            $updateemailQuery -> bindParam(":subject",$email->getSubject(),PDO::PARAM_STR);
            $updateemailQuery -> bindParam(":body",$email->getBody(),PDO::PARAM_STR);
            $updateemailQuery -> bindParam(":dateSend",$email->getdateSend(),PDO::PARAM_STR);
			$updateemailQuery->execute();
        }
// update email		
        public function update($email){
					$id = $email->getId();
					$dbh = new PDO("mysql:host=localhost;dbname=remyurda","root","");
					$req = "UPDATE recipient SET email = :email,subject = :subject WHERE id = $id";
					$updateemailQuery = $dbh ->prepare($req);
					$updateemailQuery -> bindParam(":email",$email->getEmail(),PDO::PARAM_STR);
					$updateemailQuery -> bindParam(":subject",$email->getSubject(),PDO::PARAM_STR);
	                $updateemailQuery->execute();
				}
// delete email

		public function delete($id){
			$dbh = new PDO("mysql:host=localhost;dbname=remyurda","root","");

			$req = "DELETE FROM recipient WHERE id = $id";
			$deleteemail = $dbh->prepare($req);
            $deleteemail->execute();
        }

    }
    ?>