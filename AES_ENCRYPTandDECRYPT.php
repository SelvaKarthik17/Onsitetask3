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



	  	 global $invsbtable; 
	  	 	$invsbtable = array(
	  	 		    array('52' ,'09' ,'6a' ,'d5' ,'30' ,'36' ,'a5' ,'38' ,'bf' ,'40' ,'a3' ,'9e' ,'81' ,'f3' ,'d7','fb'),
	  	 		    array('7c', 'e3', '39', '82', '9b', '2f', 'ff', '87', '34', '8e', '43', '44', 'c4', 'de', 'e9','cb'),
	  	 		    array('54', '7b', '94', '32', 'a6', 'c2', '23','3d', 'ee', '4c', '95', '0b', '42', 'fa', 'c3', '4e'),
        		    array('08', '2e', 'a1', '66', '28', 'd9', '24', 'b2', '76', '5b', 'a2', '49', '6d', '8b', 'd1', '25'),
       				array('72', 'f8', 'f6', '64', '86', '68', '98', '16', 'd4', 'a4', '5c', 'cc', '5d', '65', 'b6', '92'),
        			array('6c', '70', '48', '50', 'fd', 'ed', 'b9', 'da', '5e', '15', '46', '57', 'a7', '8d', '9d', '84'),
        			array('90', 'd8', 'ab', '00', '8c', 'bc', 'd3', '0a', 'f7', 'e4', '58', '05', 'b8', 'b3', '45', '06'),
        			array('d0', '2c', '1e', '8f', 'ca', '3f', '0f', '02', 'c1', 'af', 'bd', '03', '01', '13', '8a', '6b'),
        			array('3a', '91', '11', '41', '4f', '67', 'dc', 'ea', '97', 'f2', 'cf', 'ce', 'f0', 'b4', 'e6', '73'),
        			array('96', 'ac', '74', '22', 'e7', 'ad', '35', '85', 'e2', 'f9', '37', 'e8', '1c', '75', 'df', '6e'),
        			array('47', 'f1', '1a', '71', '1d', '29', 'c5', '89', '6f', 'b7', '62', '0e', 'aa', '18', 'be', '1b'),
        			array('fc', '56', '3e', '4b', 'c6', 'd2', '79', '20', '9a', 'db', 'c0', 'fe', '78', 'cd', '5a', 'f4'),
        			array('1f', 'dd', 'a8', '33', '88', '07', 'c7', '31', 'b1', '12', '10', '59', '27', '80', 'ec', '5f'),
        			array('60', '51', '7f', 'a9', '19', 'b5', '4a', '0d', '2d', 'e5', '7a', '9f', '93', 'c9', '9c', 'ef'),
        			array('a0', 'e0', '3b', '4d', 'ae', '2a', 'f5', 'b0', 'c8', 'eb', 'bb', '3c', '83', '53', '99', '61'),
        			array('17', '2b', '04', '7e', 'ba', '77', 'd6', '26', 'e1', '69', '14', '63', '55', '21', '0c', '7d'));
	  	 	



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


	function invsubbyte(&$arr){

		global $invsbtable;

		for($i=0;$i<4;$i++){
			$element = $arr[$i][3];
			$e1 = hexdec($element[0]);
			$e2 = hexdec($element[1]);

			$arr[$i][3] = $invsbtable[$e1][$e2];

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


	function invshiftrow(&$arr){

		$t = " ";
		$t = $arr[1][3];
		$arr[1][3] = $arr[1][2];
		$arr[1][2] = $arr[1][1];
		$arr[1][1] = $arr[1][0];
		$arr[1][0] = $t;

		$t1 = " "; $t2 = " ";
		$t1 = $arr[2][3];
		$t2 = $arr[2][2];
		$arr[2][2] = $arr[2][0];
		$arr[2][3] = $arr[2][1];
		$arr[2][1] = $t1;
		$arr[2][0] = $t2;

		$t3 = " ";

		$t1 = $arr[3][3];
		$t2 = $arr[3][2];
		$t3 = $arr[3][1];
		$arr[3][3] = $arr[3][0];
		$arr[3][2] = $t1;
		$arr[3][1] = $t2;
		$arr[3][0] = $t3;

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

    function gfm($x, $y){    //generic galoi field multiplier (128 BIT) , gets hex as inputs
    $a = base_convert($x,16, 10);
    $b = base_convert($y,16, 10);

  
    $p = 0;
    $hibit = 0;
 
    for($i=0;$i<8;$i++){	
        if ($b & 1 == 1){
            $p = $p^$a;
        }
        $hibit = ($a & 0x80) ;
        $a = $a << 1;
        if ($hibit == 0x80){
            $a = $a^0x1b;
        }
        $b = $b >> 1;
    }    
    $res = ($p%256);
	return $res; //returns decimal

}





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



	function invmixcolumn(&$arr){

		$temp = [[]];

		for($i=0;$i<4;$i++){

			//echo gfm1($arr[0][$i]);
		$temp[0][$i] = dechex(gfm(E,$arr[0][$i]) ^  gfm(B,$arr[1][$i]) ^  gfm(D,$arr[2][$i]) ^  gfm(9,$arr[3][$i]));
		$temp[1][$i] = dechex(gfm(9,$arr[0][$i]) ^  gfm(E,$arr[1][$i]) ^  gfm(B,$arr[2][$i]) ^  gfm(D,$arr[3][$i]));
		$temp[2][$i] = dechex(gfm(D,$arr[0][$i]) ^  gfm(9,$arr[1][$i]) ^  gfm(E,$arr[2][$i]) ^  gfm(B,$arr[3][$i]));
		$temp[3][$i] = dechex(gfm(B,$arr[0][$i]) ^  gfm(D,$arr[1][$i]) ^  gfm(9,$arr[2][$i]) ^  gfm(E,$arr[3][$i]));
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

	echo "\n";
	//echo matrixstr($mstate[10]);
    
	shiftrow($mstate[10]);
	//echo matrixstr($mstate[10]);

	$tempfs = [[]];
	echo "\n";
	

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
	//echo matrixstr($mstate[10]);
	echo "\n";
	echo matrixstr($cipher_text);

	$tempfs = null;




	//$a = "41";
	//$b = "53";
	//echo xr($a,$b);




//initial decryption round

	$imstate = []; //msgstates
	$imstate[0] = $cipher_text;

	echo "\n";
	//echo matrixstr($mstate[0]);
	echo "\n";
 
	$imtemp = [[]]; //temp


	for ($i=0;$i<4;$i++)
	{
		for($j=0;$j<4;$j++)
		{
			$imtemp[$i][$j] = xr($imstate[0][$i][$j],$keystate[10][$i][$j]);

		}
	}

	//echo matrixstr($imtemp);

	invshiftrow($imtemp);

	

	invsubbyte($imtemp);

	$imstate[1] = $imtemp;

//main decryption rounds(9)


	for($r=1;$r<10;$r++){


			$itempms = [[]];

			for ($i=0;$i<4;$i++)
			{
				for($j=0;$j<4;$j++)
				{
					$itempms[$i][$j] = xr($imstate[$r][$i][$j],$keystate[10-$r][$i][$j]);
				}
			}	
				

			invmixcolumn($itempms);

			invshiftrow($itempms);

			invsubbyte($itempms);

			$imstate[$r+1] = $itempms;			

	}



//final decryption round

			$itempfs = [[]];

			for ($i=0;$i<4;$i++)
			{
				for($j=0;$j<4;$j++)
				{
					$itempfs[$i][$j] = xr($imstate[10][$i][$j],$keystate[0][$i][$j]);
				}
			}	


			$imstate[11] = $itempfs;

			$decrypted_msg = $imstate[11];

			echo "\n";
			echo matrixstr($decrypted_msg); //128 BIT decrypted hexadecimal







?>
