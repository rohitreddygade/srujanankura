<?php 

namespace sruj\Mail;
 class Message 
 {
 	protected $mailer;
 	function __construct($mailer)
 	{
 		$this->mailer = $mailer;
 	}
 	public function to($address)
 	{
 		$this->mailer->addToRecipient($address);
 	}
 	public function subject($subject)
 	{
 		$this->mailer->setSubject($subject);
 	}
 	public function body($body)
 	{
 		$this->mailer->getHtmlBody($body);
 	}
 } ?>