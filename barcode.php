

<?php 


        $url = 'https://ticket-api.herokuapp.com/barcode/';
        $data = array('vendor_id' => $_POST['vendor_id'],'price' => $_POST['price']);
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
          /*echo $arr['link'];*/
          $image_link=substr($arr['link'],0,strrpos($arr['link'],'.'));
          /*echo $image_link.".png";*/
        }
        /*echo "br";*/


?>




<form action="" method="post">
      		  <label>
              Vendor Id
            </label>
            <input type="text" name="vendor_id" required>
            <br>
            <label>
              Price
            </label>
            <input type="text" name="price" required>
            
            <br>
            <input type="submit" value="Generate Barcode">
            
	  </form>



  <img src="<?php echo $image_link.".png";?>">
<!-- <a href="http://res.cloudinary.com/hjwxtjtff/image/upload/id580.pdf">File</a> -->

