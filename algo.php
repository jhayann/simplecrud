<?php

if (isset($_GET['string'])) {
	$str = $_GET['string'];
	$method = $_GET['method'];
	$method2 = $_GET['method2'];
	$str = openssl_digest($str,$method);
	$str2 = hash($method2,$str,false);
	} else {
		$str = "";
		$str2 ="";
		$method = 'sha512';
		$method2 = 'sha512';
		$sel='';
	}
	
?>

<html>
<br>
<p>INPUT STRING TO HASH: </p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
<input type="text" name="string" placeholder="INPUT"/><button type="submit">SHOW HASH</button>
<br> 
<br>
<p>OPENSSL_DIGEST HASH ALGORITHM:
<select name="method">
<option value="BLAKE2b512" >BLAKE2b512 </option>
<option value="BLAKE2s256" >BLAKE2s256 </option>
<option value="MD4" >MD4 </option>
<option value="MD5" >MD5 </option>
<option value="MD5-SHA1">MD5-SHA1 </option>
<option value="MDC2">MDC2 </option>
<option value="RIPEMD160">RIPEMD160 </option>
<option value="SHA1">SHA1 </option>
<option value="SHA224">SHA224 </option>
<option value="SHA256">SHA256 </option>
<option value="SHA384">SHA384 </option>
<option value="SHA512">SHA512 </option>
<option value="blake2b512">blake2b512 </option>
<option value="blake2s256">blake2s256 </option>
<option value="whirlpool">whirlpool </option>
</select></p>
<p>HASH ALGO: 
<select name="method2">
<option value="MD4" >MD4 </option>
<option value="MD5">MD5 </option>
<option value="MD5-SHA1" >MD5-SHA1 </option>
<option value="MDC2">MDC2 </option>
<option value="RIPEMD160">RIPEMD160 </option>
<option value="SHA1">SHA1 </option>
<option value="SHA224">SHA224 </option>
<option value="SHA256">SHA256 </option>
<option value="SHA384">SHA384 </option>
<option value="SHA512">SHA512</option>
<option value="ripemd128">ripemd128 </option>
<option value="ripemd256">ripemd256 </option>
<option value="ripemd320">ripemd320 </option>
<option value="tiger128,3">tiger128,3 </option>
<option value="tiger160,3">tiger160,3 </option>
<option value="tiger192,3">tiger192,3 </option>
<option value="tiger128,4">tiger128,4 </option>
<option value="tiger160,4">tiger160,4 </option>
<option value="tiger192,4">tiger192,4 </option>
<option value="snefru">snefru </option>
<option value="snefru256">snefru256 </option>
<option value="gost">gost </option>
<option value="gost-crypto">gost-crypto </option>
<option value="adler32">adler32 </option>
<option value="crc32">crc32 </option>
<option value="crc32b">crc32b </option>
<option value="fnv132">fnv132 </option>
<option value="fnv1a32">fnv1a32 </option>
<option value="fnv164">fnv164 </option>
<option value="fnv1a64">fnv1a64 </option>
<option value="joaat">joaat </option>
<option value="haval128,3">haval128,3 </option>
<option value="haval160,3">haval160,3 </option>
<option value="haval192,3">haval192,3 </option>
<option value="haval224,3">haval224,3 </option>
<option value="haval256,3">haval256,3 </option>
<option value="haval128,4">haval128,4 </option>
<option value="haval160,4">haval160,4 </option>
<option value="haval192,4">haval192,4 </option>
<option value="haval224,4">haval224,4 </option>
<option value="haval256,4">haval256,4 </option>
<option value="haval128,5">haval128,5 </option>
<option value="haval160,5">haval160,5 </option>
<option value="haval192,5">haval192,5 </option>
<option value="haval224,5">haval224,5 </option>
<option value="haval256,5">haval256,5 </option>
<option value="whirlpool">whirlpool </option>
</select>
</p>
</form>
<br>
<br>
<p>OPEN SSL: </p>
<textarea style="width:500px;height:100px;font-family:Arial Black;">
 <?=$str;?> 
</textarea> 
<br><br>
<p>Hash algo: </p>
<textarea style="width:500px;height:100px;font-family:Arial Black;">
 <?=$str2;?> 
</textarea> <br>
<?php

    //  var_dump(hash_algos()); 
	$options = [
    'cost' => 10
	];
	$string = "123456";
	echo $hsh = password_hash($string,PASSWORD_BCRYPT, $options);
	
	

if (password_verify('123456', $hsh)) {
	echo '<br>';
    echo 'Password is valid!';
} else {
	echo '<br>';
    echo 'Invalid password.';
}
     
	 
	//DETERMINE THE COST Appropriate for your server
$timeTarget = 0.05; // 50 milliseconds 
$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);
echo '<br>';
echo "Appropriate Cost Found: " . $cost;

?> 
</html>