<?php
include("functions.php"); 
if (isset($_POST)) {
	$host = filterString($_POST['host']); $username = filterString($_POST['username']); $password = filterString($_POST['password']);
	$auth = filterString($_POST['auth']); $port = filterString($_POST['port']); $name = filterString($_POST['name']);
	
	$query = $conn->query("UPDATE smtp_setting SET host = '$host', password = '$password', username = '$username', port = '$port', smtp_auth = '$auth', display_name = '$name' WHERE id = 1");
echo "
	  <script> Swal.fire('Settings Updated', 'site  details have been updated', 'success');
           </script>
      ";
      //sleep(3);
      echo mysqli_error($conn);
     ?>
 <meta http-equiv="refresh" content="3; url=../admin/smtp">
     <?php
}
?>