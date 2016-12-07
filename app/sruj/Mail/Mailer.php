<?php 

namespace sruj\Mail;
/**
* 
*/
class Mailer
{
	protected $mailer;
	protected $config
	protected $view;
	function __construct($view,$config,$mailer)
	{
		$this->mailer = $mailer;
		$this->config = $config;
		$this->view   = $view;
	}
	public function send($template,$data,$callback)
	{
		$builder = $this->mailer->MessageBuilder();
		$builder->setFromAddress($this->config->get('mail.from'))
		$message = new Message($this->mailer);
		$this->view->appendData($data);
		$message->body($this->view->render($template));
		call_user_func($callback,$message);
		$domain = $this->config->get('mail.domain');
		$this->mailer->post("{$domain}/messages",$builder->getMessage());
	}
}