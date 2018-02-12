<?php
function stringCutter($string){
	if(strlen($string) > 20){
		return substr($string, 0,20)."...";
	}else{
		return $string ;
	}
}








?>