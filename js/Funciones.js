/*Valida el campo username para verificar si existe*/
//$(document).ready(function () {
//    $("#user_name").focusout(function (e) {
//        /*Remueve el mensaje de usuario inexistente*/
//        $(".error_user_exist").remove();
//        e.preventDefault();
//        /*Se consulta el usuario introducido 
//         * para saber si no existe y mostrar mensaj al usuario*/
//        if ($("#user_name").val() !== "") {
//            var fullName = $("#user_name").val();
//            $.ajax({
//                type: 'POST',
//                data: {fullName: fullName},
//                url: 'http://localhost/RegisterParts/index.php/Login_control/userExist',
//                success: function (result) {
//					alert(result);
//                    if (result !== 'true') {
//                        //alert('ENTROOOO_RESULT');
//                        $("#mensaje").focus().after("<span class='error_user_exist'>Usuario no existe</span>");
//                        return false;
//                    }
//                }
//            });
//        }
//
//    });
//
//});


/*Valida el campo email de la pantalla password para verificar si existe*/
$(document).ready(function () {
    $("#btnsend").click(function (e) {
      
        /*Remueve el mensaje de usuario inexistente*/
        $(".error_user_exist").remove();
        e.preventDefault();
        /*Se consulta el correo introducido 
         * para saber si no existe y mostrar mensaje al usuario*/
        if ($("#idemail").val() !== "") {
            var fullName = $("#idemail").val();
            $.ajax({
                type: 'POST',
                data: {fullName: fullName},
                url: 'http://localhost/RegisterParts/index.php/Password_control/sendMail',
                success: function (result) {
                    alert(result);
                    if (result === 'true') {
                        $("#mensaje").focus().after("<span class='error_user_exist'>Correo enviado</span>");
                        return false;
                    } else {
                        $("#mensaje").focus().after("<span class='error_user_exist'>Correo no pudo ser enviado</span>");
                        return false;
                    }
                }
            });
        }

    });

});


/*Valida el campo email de la pantalla user para verificar si existe*/
$(document).ready(function () {
    $("#idemail").focusout(function (e) {
        /*Remueve el mensaje de usuario inexistente*/
        $(".error_user_exist").remove();
        e.preventDefault();
        /*Se consulta el correo introducido 
         * para saber si no existe y mostrar mensaje al usuario*/
        if ($("#idemail").val() !== "") {
            var fullName = $("#idemail").val();
             //alert(fullName);
            $.ajax({
                type: 'POST',
                data: {fullName: fullName},
                url: 'http://www.devetechnologies.com/RegisterParts/index.php/User_control/emailExist',
                success: function (result) {
                    //alert(result);
                    if (result === 'true') {
                       $("#mensaje").focus().after("<span class='error_user_exist'>El correo existe favor verificar</span>");
                        return false;
                    } 
                }
            });
        }

    });

});

/*Valida el campo user de la pantalla user para verificar si existe*/
$(document).ready(function () {
    $("#iduser").focusout(function (e) {
        /*Remueve el mensaje de usuario inexistente*/
        $(".error_user_exist").remove();
        e.preventDefault();
        //alert();
        /*Se consulta el correo introducido 
         * para saber si no existe y mostrar mensaje al usuario*/
        if ($("#iduser").val() !== "") {
            var fullName = $("#iduser").val();
             //alert(fullName);
            $.ajax({
                type: 'POST',
                data: {fullName: fullName},
                url: 'http://www.devetechnologies.com/RegisterParts/index.php/User_control/userExist',
                success: function (result) {
                    //alert(result);
                    if (result === 'true') {
                       $("#mensajeuser").focus().after("<span class='error_user_exist'>Existen registro para este usuario</span>");
                        return false;
                    } 
                }
            });
        }

    });

});
