<?php 
include "connect.php";
$query_showtask = "select * from tasks where id='".$_REQUEST['btn_task']."'";
$result_showtask = mysqli_query($connect,$query_showtask) or die(mysqli_error($connect));
while($item=mysqli_fetch_assoc($result_showtask))
{?>
   <h2 class="name_task"><?=$item['name_task']?></h2>
   <div class="container_task">
       <p><?=$item['question_task']?></p>
	<form>
		<label>
			<input type="radio" id="rad_btn" name="radio_sel" onChange="document.getElementById('solve').value = this.value" value="<?=$item['first_var']?>"/>
			<span><?=$item['first_var']?></span>
		</label>
		<label>
			<input type="radio" id="rad_btn" name="radio_sel" onChange="document.getElementById('solve').value = this.value" value="<?=$item['second_var']?>"/>
			<span><?=$item['second_var']?></span>
		</label>
		<label>
			<input type="radio" id="rad_btn" name="radio_sel" onChange="document.getElementById('solve').value = this.value" value="<?=$item['third_var']?>"/>
			<span><?=$item['third_var']?></span>
		</label>
        <label>
			<input type="radio" id="rad_btn" name="radio_sel" onChange="document.getElementById('solve').value = this.value" value="<?=$item['fourth_var']?>"/>
			<span><?=$item['fourth_var']?></span>
		</label>
		<!-- <script>
			const inputArr = document.getElementsByName('radio_sel');
			inputArr.forEach((input) => {
					input.addEventListener('click', (e) => {
						document.getElementsByName('solve_answer').value=e.target.value;
				});
			}) -->
		<!-- </script> -->
	</form>
</div>
<?php
}
?>