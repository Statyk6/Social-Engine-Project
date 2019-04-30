//alert("Javascript подключен");
$(document).ready(function() {
    $("#submit_2").click(function() {
        $("#openModal").css("display", "block");
        $("#close").css("display", "block");
    });
    $(".submit_reg").click(function (event) {
        event.preventDefault();
        var email=$("#email").val();
        var password=$("#password").val();
        var password_2=$("#password_2").val();
        $.ajax({
            type:"POST",
            url:"controllers/action_register.php",
            data:{
                'email' : email,
                'password' : password,
                'password_2' : password_2,
                'form' : 'reg'
            },
            success:function (data) {
            	data = JSON.parse(data);
            	console.log(data);
                if (typeof(data.status) != "undefined"){
                    if(data.status=='err'){
                        if(data.otv==1){
                            //Введите e-mail!
                            $('#email').css('border-color', 'red');
                            $('#inform').text('Введите e-mail!');
                        }
                        if(data.otv==2){
                            //Указанный Вами e-mail имеет недопустимый формат!
                            $('#email').css('border-color', 'red');
                            $('#inform').text('Указанный Вами e-mail имеет недопустимый формат!');
                        }
                        if(data.otv==3){
                            //Придумайте пароль!
                            $('#password').css('border-color', 'red');
                            $('#inform').text('Придумайте пароль!');
                        }
                        if(data.otv==4){
                            //Пароль должен состоять из 6-20 символов, содержать хоть одну заглавную букву и один символ!
                            $('#password').css('border-color', 'red');
                            $('#inform').text('Пароль должен состоять из 6-20 символов, содержать хоть одну заглавную букву и один символ!');
                        }
                        if(data.otv==5){
                            //Введите пароль еще раз!
                            $('#password_2').css('border-color', 'red');
                            $('#inform').text('Введите пароль еще раз!');
                        }
                        if(data.otv==6){
                            //Пароли не совпадают!
                            $('#password_2').css('border-color', 'red');
                            $('#inform').text('Пароли не совпадают!');
                        }
                        /* -------------------------------------------------------------------------------------------*/
                        if(data.otv==7){
                            //Пароли не совпадают!
                            $('#email').css('border-color', 'red');
                            $('#inform').text('Такой e-mail уже кем-то используется!');
                        }
                        /* ------------------------------------------------------------------------------------------*/
                        console.log('Ошибка: '+data.otv);
                    }
                    else if(data.status=='ok'){
                        //тут регистрация удалась) идем дальше
                        $("#inform").html(data.otv);
                    }
                }
                else{
                    console.log('ошибка: неверный ответ от сайта');
                }

                
            }
        })
    })
});