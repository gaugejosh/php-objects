<?php

class StaticExample
{
	static public $aNum = 0;
	static public function sayHello() {
		print "Hello!";
	}
}

print StaticExample::$aNum;
StaticExample::sayHello();