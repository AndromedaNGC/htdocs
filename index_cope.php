<?php 
	session_start();
	if(isset($_SESSION['user'])){
		header('Location: quest.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Components/back_animation.css">
	<link rel="stylesheet" href="assets/css/Components/reg_auth.css">
    <title>Document</title>
</head>
<body style="background-color: #100E17;">
    <div class="context" id="open-context">
        <h1>Ura quest</h1>
        <p class="text">Приветствуем тебя на нашем квесте, в котором ты сможешь применить собственные
        знания при решение непростых задач, а также сможешь приобрести новые знания 
        способные дать тебе подсказки. Для тебя дорогой игрок, только одна цель, 
        пройти квест Ura и соблюдать только одно правило, это пройти любой ценой:) 
        Твои ответы и твоя победа в твоей голове. 
        <br/>Ну что, начнём?
	</p>
	<div class="merge_reg_auth">
		<form id="mainButton_reg" action="./vendor/reg.php" method="POST">
			<div class="btn-text_reg" onclick="openForm_reg()">Регистрация</div>
			<div class="modal_reg">
				<div class="close-button_reg" onclick="closeForm_reg()">x</div>
				<div class="form-title_reg">Регистрация</div>
				<div class="input-group_reg">
					<input type="text" id="name" name="login" onblur="checkInput_reg(this)" required/>
					<label for="name">Логин</label>
				</div>
				<div class="input-group_reg">
					<input type="email" id="email" name="email" onblur="checkInput_reg(this)" required/>
					<label for="name">Email</label>
				</div>
				<div class="input-group_reg">
					<input type="password" id="password" name="pass" onblur="checkInput_reg(this)" required/>
					<label for="password">Пароль</label>
				</div>
				<div class="input-group_reg">
					<input type="password" id="password" name="pass2" onblur="checkInput_reg(this)" required/>
					<label for="password">Повторите пароль</label>
				</div>
				<button class="form-button_reg" name="submit">Зарегистрироваться</button>
			</div>
		</form>
        <form id="mainButton_log" action="./vendor/auth.php" method="post">
			<div class="btn-text_log" onclick="openForm_log()">Вход</div>
			<div class="modal_log">
				<div class="close-button_log" onclick="closeForm_log()">x</div>
				<div class="form-title_log">Вход</div>
				<div class="input-group_log">
					<input type="text" id="name" name="login_log" onblur="checkInput_log(this)" required/>
					<label for="name">Логин</label>
				</div>
				<div class="input-group_log">
					<input type="password" id="password" name="pass_log" onblur="checkInput_log(this)" required/>
					<label for="password">Пароль</label>
				</div>
				<button class="form-button_log" name="submit">Войти</button>
			</div>
		</form>
    </div>
	<?php
		if (isset($_SESSION['message'])) {
			echo '<p style="color: darkorange;" class="error_message"> ' . $_SESSION['message'] . ' </p>';
		}
		unset($_SESSION['message']);
	?>
</div>

<div class="area" >
    <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
    </ul>
</div>
<script>
	var button_reg = document.getElementById('mainButton_reg');
	var button_log = document.getElementById('mainButton_log');
	
	var openForm_reg = function() {
		button_reg.className = 'active_reg';
	};
	var openForm_log = function() {
		button_log.className = 'active_log';
	};

	var checkInput_reg = function(input) {
		if (input.value.length > 0) {
			input.className = 'active_reg';
		} else {
			input.className = '';
		}
	};
	var checkInput_log = function(input) {
		if (input.value.length > 0) {
			input.className = 'active_log';
		} else {
			input.className = '';
		}
	};

	var closeForm_reg = function() {
		button_reg.className = '';
	};

	var closeForm_log = function() {
		button_log.className = '';
	};

	document.addEventListener("keyup_reg", function(e) {
		if (e.keyCode == 27 || e.keyCode == 13) {
			closeForm_reg();
		}
	});
	document.addEventListener("keyup_log", function(e) {
		if (e.keyCode == 27 || e.keyCode == 13) {
			closeForm_log();
		}
	});
</script>
</body>
</html>

