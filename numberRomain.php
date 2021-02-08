

<!DOCTYPE html>
<html>
<body>
	<style type="text/css">
		.result{
			margin-left: 160px;
			margin-top:60px;
		}
	</style>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Number: <input type="text" name="number">
  Limit: <input type="text" name="limit">

  <input type="submit" value="valider">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $number = $_POST['number'];
    $limit = $_POST['limit'];

    if (empty($number) || empty($limit)) {
        echo "check inputs is are not empty";
    } else {
    	echo "<p class='result'>";
         print_r(displayRange($number,$limit));
        echo "</p>";

    }
}

//************************************
      // A function to return the Roman Numeral, given an integer
     function numberToRoman($num) 
     {
         // Make sure that we only use the integer portion of the value
         $n = intval($num);
         $result = '';

         // Declare a lookup array that we will use to traverse the number:
         $lookup = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
         'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
         'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

         foreach ($lookup as $roman => $value) 
         {
             // Determine the number of matches
             $matches = intval($n / $value);

             // Store that many characters
             $result .= str_repeat($roman, $matches);

             // Substract that from the number
             $n = $n % $value;
         }

         // The Roman numeral should be built, return it
         return $result;
     }


	function displayRange($input,$limit){
	    foreach(range($input, $limit) as $number){
	    $spliter=($number%10==0) ? '<br>' : '&nbsp&nbsp&nbsp&nbsp';
	    echo(numberToRoman($number).$spliter);
	    }
	}



?>

</body>
</html>