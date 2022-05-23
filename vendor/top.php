<?php 
include "connect.php";
$query_showtask = "select * from tasks where id='".$_REQUEST['btn_task']."'";
$result_showtask = mysqli_query($connect,$query_showtask) or die(mysqli_error($connect));
while($item=mysqli_fetch_assoc($result_showtask))
{?>
   

<?php
}
?>