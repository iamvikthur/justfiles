<?php
function stringCutter($string){
	if(strlen($string) > 30){
		return substr($string, 0,30)."...";
	}else{
		return $string ;
	}
}








?>