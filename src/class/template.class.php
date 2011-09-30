<?php

class TemplateParser
{
	private $TemplateContent;
	
	public function __construct($Template)
	{
		$this->TemplateContent = file_get_contents($Template);
	}
	
	public function Assign($Name, $Value)
	{
		$this->TemplateContent = str_replace("<%$Name%>", $Value, $this->TemplateContent);
	}
	
	public function Show()
	{
		echo $this->TemplateContent;
	}
}


?>