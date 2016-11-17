

<?php 

if($_POST['barcode'] != '' && $_POST['ref_no'] != ''){
        $url = 'https://ticket-api.herokuapp.com/decode/';
        $data = array('barcode' => $_POST['barcode'],'ref_no' => $_POST['ref_no']);
        // use key 'http' even if you send the request to https://...
        $options = array(
          'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
          ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        /*echo $result;*/
        $arr = json_decode($result,true);
        if($arr != ''){
          echo "Your vendor id is ".$arr['vendor_id']." and price is ".$arr['price'];
        }
        /*echo "br";*/

}
?>




<form action="" method="post">
      		  <label>
              Barcode
            </label>
            <input type="text" name="barcode" required>
            <br>
            <label>
              Reference no.
            </label>
            <input type="text" name="ref_no" required>
            
            <br>
            <input type="submit" value="Decode">
            
	  </form>


