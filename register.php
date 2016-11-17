

<?php 


        $url = 'https://ticket-api.herokuapp.com/vendor_register/';
        $data = array('firstname' => $_POST['firstname'],'lastname' => $_POST['lastname'],'email' => $_POST['email'],'phone' => $_POST['phone']);
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
          echo "Your vendor id is ".$arr['vendor_id'];
        }
        /*echo "br";*/


?>




<form action="" method="post">
      		  <label>
              Firstname
            </label>
            <input type="text" name="firstname" required>
            <br>
            <label>
              Lastname
            </label>
            <input type="text" name="lastname" required>
            <br>
            <label>
              Email
            </label>
            <input type="text" name="email">
            <br>
            <label>
              Phone
            </label>
            <input type="text" name="phone">
            <br>
            

            <input type="submit" value="Register">
            
	  </form>


