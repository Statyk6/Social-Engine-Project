<?php
/**
 * Created by PhpStorm
 * User: Kravets Alexandr
 * Social Engine Project
 * Date: 20.04.2019
 * Time: 23:52
 */

// Контроллер регистрации пользователей
function otv($status, $txt){	//функция для упрощения отправки ответа в json формате
	return json_encode(array("status" => $status, "otv" => $txt));
}
require_once("../configs/database.php");

if(isset($_POST['form']) && $_POST['form']=="reg"){

	if(empty($_POST['email'])){
        //Введите e-mail!
		echo otv("err",1);
	}
	elseif((!preg_match("/.+@.+\..+/i", $_POST['email']))){
		//Указанный Вами e-mail имеет недопустимый формат!
        echo otv("err",2);
    }
    elseif(empty($_POST['password'])){
    	//Придумайте пароль!
        echo otv("err",3);
    }
    elseif((!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/", $_POST['password']))){
        //Пароль должен состоять из 8-20 символов, содержать хоть одну заглавную букву и один символ!
        echo otv("err",4);
    }
    elseif(empty($_POST['password_2'])){
    	//Введите пароль еще раз!
        echo otv("err",5);
    }
    elseif($_POST['password_2']!=$_POST['password']){
    	//Пароли не совпадают!
        echo otv("err",6);
    }
    elseif(isset($_POST['email'])){
        $value = DB::getValue("SELECT `id` FROM `users` WHERE `email` = ?", array($_POST['email']));
        if($value != null) echo otv("err",7);
        else{
        	$insert_id = DB::add("INSERT INTO users (email,password,date,ip) VALUES (?,?,?,?)", array($_POST['email'], password_hash(PASSWORD_DEFAULT, $_POST['password']), date('d-m-Y H:i:s'), $_SERVER['REMOTE_ADDR']));
        	if($insert_id>0){
        	    echo otv("ok","<font color='green'>Вы успешно зарегистрированы!</font>");
        	}
        }
    }
}


?>