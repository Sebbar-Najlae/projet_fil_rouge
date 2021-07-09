<?php

class Email implements JsonSerializable {
	public function jsonSerialize()
    {
        return array(
			 'id' => $this->_id,
             'email' => $this->_email,
             'subject' => $this->_subject,
             'body' => $this->_body,
             'dateSend' => $this->_dateSend,
        );
    }
	private $_id;
	private $_email;
	private $_subject;
	private $_body;
	private $_dateSend;
	
	public function __construct() {
	
	}

		public function getId() { return $this->_id; }
		public function getEmail() { return $this->_email; }
		public function getSubject() { return $this->_subject; }
		public function getbody() { return $this->_body; }
		public function getdateSend() { return $this->_dateSend; }


		public function setId($id){
			$this->_id = (int) $id;
		}

		public function setEmail($email){	
					$this->_email = $email;
			
		}
		public function setSubject($subject){
					$this->_subject = $subject;
		}

		public function setBody($body){
				$this->_body = $body;
		}

		public function setDate($dateSend){
					$this->_dateSend = $dateSend;
		}

}
?>