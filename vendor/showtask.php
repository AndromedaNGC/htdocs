<?php 
include "./connect.php";
$query_showtask = "select * from tasks where id='".$_REQUEST['btn_task']."'";
$result_showtask = mysqli_query($connect,$query_showtask) or die(mysqli_error($connect));
while($item=mysqli_fetch_assoc($result_showtask))
{?>
   <h2 class="name_task"><?=$item['name_task']?></h2>
   <div class="container_task">
       <p><?=$item['question_task']?></p>
	<form>
		<label>
			<input type="radio" name="radio" checked/>
			<span><?=$item['first_var']?></span>
		</label>
		<label>
			<input type="radio" name="radio"/>
			<span><?=$item['second_var']?></span>
		</label>
		<label>
			<input type="radio" name="radio"/>
			<span><?=$item['third_var']?></span>
		</label>
        <label>
			<input type="radio" name="radio"/>
			<span><?=$item['fourth_var']?></span>
		</label>
	</form>
</div>
<?php
}
?>