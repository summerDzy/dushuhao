<?php
namespace App\Http\Controllers;
class foo

{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

    public function setName($name)
    {
        $this->name = $name; 
    }

    public function getName()
    {
    	return $this->name;
    }

}


?>