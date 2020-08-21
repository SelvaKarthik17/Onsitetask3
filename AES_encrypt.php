<?php

	//$sbtable = [[]]; // sub byte transform lookup table


		error_reporting(0); // to avoid displaying notices (of array indexes offsets) before the execution to assign values 


        global $sbtable;
	  	 $sbtable = array(
        array('63', '7c', '77', '7b', 'f2', '6b', '6f', 'c5', '30', '01', '67', '2b', 'fe', 'd7', 'ab', '76'),
        array('ca', '82', 'c9', '7d', 'fa', '59', '47', 'f0', 'ad', 'd4', 'a2', 'af', '9c', 'a4', '72', 'c0'),
        array('b7', 'fd', '93', '26', '36', '3f', 'f7', 'cc', '34', 'a5', 'e5', 'f1', '71', 'd8', '31', '15'),
        array('04', 'c7', '23', 'c3', '18', '96', '05', '9a', '07', '12', '80', 'e2', 'eb', '27', 'b2', '75'),
        array('09', '83', '2c', '1a', '1b', '6e', '5a', 'a0', '52', '3b', 'd6', 'b3', '29', 'e3', '2f', '84'),
        array('53', 'd1', '00', 'ed', '20', 'fc', 'b1', '5b', '6a', 'cb', 'be', '39', '4a', '4c', '58', 'cf'),
        array('d0', 'ef', 'aa', 'fb', '43', '4d', '33', '85', '45', 'f9', '02', '7f', '50', '3c', '9f', 'a8'),
        array('51', 'a3', '40', '8f', '92', '9d', '38', 'f5', 'bc', 'b6', 'da', '21', '10', 'ff', 'f3', 'd2'),
        array('cd', '0c', '13', 'ec', '5f', '97', '44', '17', 'c4', 'a7', '7e', '3d', '64', '5d', '19', '73'),
        array('60', '81', '4f', 'dc', '22', '2a', '90', '88', '46', 'ee', 'b8', '14', 'de', '5e', '0b', 'db'),
        array('e0', '32', '3a', '0a', '49', '06', '24', '5c', 'c2', 'd3', 'ac', '62', '91', '95', 'e4', '79'),
        array('e7', 'c8', '37', '6d', '8d', 'd5', '4e', 'a9', '6c', '56', 'f4', 'ea', '65', '7a', 'ae', '08'),
        array('ba', '78', '25', '2e', '1c', 'a6', 'b4', 'c6', 'e8', 'dd', '74', '1f', '4b', 'bd', '8b', '8a'),
        array('70', '3e', 'b5', '66', '48', '03', 'f6', '0e', '61', '35', '57', 'b9', '86', 'c1', '1d', '9e'),
        array('e1', 'f8', '98', '11', '69', 'd9', '8e', '94', '9b', '1e', '87', 'e9', 'ce', '55', '28', 'df'),
        array('8c', 'a1', '89', '0d', 'bf', 'e6', '42', '68', '41', '99', '2d', '0f', 'b0', '54', 'bb', '16'));


	     //echo $sbtable[2][3];


	//$rcon = [[]]; //predefined table 
	     global $rcon;
	 $rcon = array(
	    array('00', '00', '00', '00'),
        array('01', '00', '00', '00'),
        array('02', '00', '00', '00'),
        array('04', '00', '00', '00'),
        array('08', '00', '00', '00'),
        array('10', '00', '00', '00'),
        array('20', '00', '00', '00'),
        array('40', '00', '00', '00'),
        array('80', '00', '00', '00'),
        array('1b', '00', '00', '00'),
        array('36', '00', '00', '00'));
	


	
	$text = "ABCDEFGHIJKLMOPQ"; //plain text input 
	$ikey = "FDEJSDFJASDSKJNS"; //initial key input 128 BIT

	$keystate = []; //array for the 11 keystates(128 bit)

	function strmatrix($string){

		$matrix = [[]];
		$t = 0;
		//$j = 0;

		for($i=0; $i<4;$i++){

			for($j=0; $j<4;$j++){
				$matrix[$j][$i] = bin2hex($string[$t]); //columnmajor 
				//echo $matrix[$j][$i];
				//echo "\n";
				$t = $t + 1;
				//echo $t;
				//echo "\n";
			}
		
		}
		//echo $t;
		//$t = 0;
		return $matrix;

	}

	function matrixstr($arr){

			$string = "";
			$t = 0;

		for($i=0; $i<4;$i++){

			for($j=0; $j<4;$j++){
				//$string[$t] = $arr[$j][$i]; //columnmajor 
				$string .= $arr[$j][$i];
				//echo $arr[$j][$i];
				//echo "\n";
				//echo $string;
				//echo "\n";
				$t = $t + 1;
				//echo $t;
				//echo "\n";
			}
		
		}

		//$t = 0;
		return $string;

	}


   // $test = strmatrix($ikey);
	//echo $test[3][2];

	function rotword(&$arr){
		$temp = " ";
		$t2 = " ";
		$temp = $arr[0][3];
		$t2 = $arr[1][3];
		$arr[0][3] = $arr[3][3];
		$arr[1][3] = $arr[2][3];
		$arr[2][3] = $t2;
		$arr[3][3] = $temp;

	}


	function subbyte(&$arr){

		global $sbtable;

		for($i=0;$i<4;$i++){
			$element = $arr[$i][3];
			$e1 = hexdec($element[0]);
			$e2 = hexdec($element[1]);

			$arr[$i][3] = $sbtable[$e1][$e2];

		}

	}

 	function xr($a,$b){
  		return dechex(hexdec($a) ^ hexdec($b));
	}
  

	function keygen($key,$k) //pass initial key matrix (128 bit) to get next keystate
	{	
		global $rcon;
		global $keystate;
		//$keymat = strmatrix($key);
		rotword($key);
		subbyte($key);
		$rkey = [[]];

		for($i=0;$i<4;$i++){

			$rkey[$i][0] = xr(xr($key[$i][0],$key[$i][3]),$rcon[$i][$k]);
		}


		for($i=0;$i<4;$i++){

			$rkey[$i][1] = xr($rkey[$i][0],$key[$i][2]);
		}

		for($i=0;$i<4;$i++){

			$rkey[$i][2] = xr($key[$i][2],$rkey[$i][1]);
		}

		for($i=0;$i<4;$i++){

			$rkey[$i][3] = xr($key[$i][3],$rkey[$i][2]);
		}

		$k = $k + 1; //to get no of next keystate.
		$keystate[$k] = $rkey;


	}

	

	$ikeymat = strmatrix($ikey);
	//echo matrixstr($ikeymat);

	$keystate[0] = $ikeymat;
	

	for($r=0;$r<11;$r++)
	{	
		keygen($keystate[$r],$r);
		//echo $keystate[$r][0][0];
		//echo "\n";
		//echo matrixstr($keystate[$r]);
		//echo "\n";
	}



	function shiftrow(&$arr){

		$t = " ";
		$t = $arr[1][0];
		$arr[1][0] = $arr[1][1];
		$arr[1][1] = $arr[1][2];
		$arr[1][2] = $arr[1][3];
		$arr[1][3] = $t;

		$t1 = " "; $t2 = " ";
		$t1 = $arr[2][0];
		$t2 = $arr[2][1];
		$arr[2][0] = $arr[2][2];
		$arr[2][1] = $arr[2][3];
		$arr[2][2] = $t1;
		$arr[2][3] = $t2;

		$t3 = " ";

		$t1 = $arr[3][0];
		$t2 = $arr[3][1];
		$t3 = $arr[3][2];
		$arr[3][0] = $arr[3][3];
		$arr[3][1] = $t1;
		$arr[3][2] = $t2;
		$arr[3][3] = $t3;


	}



	function gfm2 ($hexno){   //Galoi field mulltiplier (*2) (dot product)

		$bin = base_convert($hexno,16, 2);


	/*	for($i=0;$i<strlen($bin);$i++)
		{
			$j = strlen($bin) - $i - 1;

			if($bin[$j]==1 && $j>0)
			{
				$bin[$j-1] =$bin[$j-1] + 1;
				$bin[$j] = 0;
			}

			if($j== 0 && $bin[$j]==1)
			{	
				$temp = [];
				$temp[0] = 1;

				$bin = array_merge($temp,$bin);
				//$bin[0] = 1;

			}
		} */

		$l = strlen($bin);
		$bin[$l] = 0;

		if(strlen($bin)==9 && $bin[0]==1)
		{	
			//$j = strlen($bin) - $i;

			$bin[7] = $bin[7] + 1;				
			$bin[6] = $bin[6] + 1;	
			$bin[4] = $bin[4] + 1;	
			$bin[3] = $bin[3] + 1;	

			$bin = substr($bin,1); 	// polynomial reduction due to finite field.
			//array_shift($bin);
		}

	/*	echo strlen($bin);
		echo "\n";*/

		for($i=0;$i< strlen($bin);$i++)
		{   
			$j = strlen($bin) - $i -1;

			if($bin[$j]==2)
			{
				$bin[$j] = 0;
			}
			elseif ($bin[$j]==3) {
				
				$bin[$j] =1;
			}

		}
		//$final = base_convert($bin,2, 16);

		return base_convert($bin,2,16);	
	}

	function gfm3 ($hexno){ //Galoi field mulltiplier (*3) (dot product)

		$p1 = gfm2($hexno);
		$p2 = base_convert($hexno,16, 2);
		$bin = [];
		$bin= '00000000';
		//$bin = str_pad($bin,8,'0');

		if(strlen($p2)<8)
		{
			$p2 = str_pad($p2,8,'0',STR_PAD_LEFT);
		}

		for($i=0; $i < 8;$i++)
		{
			$j = 7 - $i ;

			if($p1[$j] == $p2[$j] )
			{
				$bin[$j] = 0 ;
			}

			else if(($p1[$j] == 1) || ($p2[$j] == 1))
			{
				$bin[$j] = 1;
			}

		}

		return base_convert($bin,2,16);
		//$bin;

	}

	function gfm1($hexno){ //Galoi field mulltiplier (*1) (dot product)

		$bin = base_convert($hexno,16, 2);

		if(strlen($bin)<8){
			$bin = str_pad($bin,8,'0',STR_PAD_LEFT);
		}

		return base_convert($bin,2,16);

	}


	//echo base_convert(gfm3("FD"),2,16);

	//$hx = "AF1321";
	//gfm2($hx);

	//function bxor($a,$b){
		//return 
	//}

	function mixcolumn(&$arr){

		$temp = [[]];

		for($i=0;$i<4;$i++){


			//echo gfm1($arr[0][$i]);
		$temp[0][$i] = dechex(hexdec(gfm2($arr[0][$i])) ^  hexdec(gfm3($arr[1][$i])) ^  hexdec(gfm1($arr[2][$i])) ^  hexdec(gfm1($arr[3][$i])));
		$temp[1][$i] = dechex(hexdec(gfm1($arr[0][$i])) ^  hexdec(gfm2($arr[1][$i])) ^  hexdec(gfm3($arr[2][$i])) ^  hexdec(gfm1($arr[3][$i])));
		$temp[2][$i] = dechex(hexdec(gfm1($arr[0][$i])) ^  hexdec(gfm1($arr[1][$i])) ^  hexdec(gfm2($arr[2][$i])) ^  hexdec(gfm3($arr[3][$i])));
		$temp[3][$i] = dechex(hexdec(gfm3($arr[0][$i])) ^  hexdec(gfm1($arr[1][$i])) ^  hexdec(gfm1($arr[2][$i])) ^  hexdec(gfm2($arr[3][$i])));
		//echo $temp[3][$i];
		//echo "\n";

	}

	$arr = $temp;


	}

	
	//generate keys
		//***



	//initial round

	
   	

	$msg = strmatrix($text);
	//echo "ase\n";
	//echo matrixstr($msg);

	//echo "\n";

	$mstate = []; //msgstates
	$mstate[0] = $msg;

	echo "\n";
	//echo matrixstr($mstate[0]);
	echo "\n";
 
	$mtemp = [[]]; //temp

	for ($i=0;$i<4;$i++)
	{
		for($j=0;$j<4;$j++)
		{
			$mtemp[$i][$j] = xr($mstate[0][$i][$j],$keystate[0][$i][$j]);

		}
	}

	$mstate[1] = $mtemp;
	echo "\n";
	//echo matrixstr($mstate[1]);
	echo "\n";
   //main rounds


	for($r=1;$r<10;$r++){

			subbyte($mstate[$r]);
			//echo matrixstr($mstate[$r]);
			//echo "\n";

			shiftrow($mstate[$r]);
			//echo matrixstr($mstate[$r]);
			//echo "\n";

			mixcolumn($mstate[$r]);

			//echo matrixstr($mstate[$r]);
			//echo "\n";

			$tempms = [[]];

			for ($i=0;$i<4;$i++)
			{
				for($j=0;$j<4;$j++)
				{
					$tempms[$i][$j] = xr($mstate[$r][$i][$j],$keystate[$r][$i][$j]);
				}
			}	

			$mstate[$r+1] = $tempms;	

			//echo matrixstr($mstate[$r+1]);
			//echo "\n";


	}
	//echo matrixstr($mstate[10]);

	//last round 

	subbyte($mstate[10]);

	shiftrow($mstate[10]);

	$tempfs = [[]];

	for ($i=0;$i<4;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				$tempfs[$i][$j] = xr($mstate[10][$i][$j],$keystate[10][$i][$j]);
			}
		}	

	$mstate[11] = $tempfs;	


	$cipher_text = $mstate[11]; //128 bit cipher text

	echo "\n";
	echo matrixstr($tempfs);

	$tempfs = null;




	//$a = "41";
	//$b = "53";
	//echo xr($a,$b);




?>
