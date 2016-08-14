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
                url: 'http://localhost/RegisterParts/index.php/User_control/emailExist',
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
                url: 'http://localhost/RegisterParts/index.php/User_control/userExist',
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

/*Aqui se recibe los datos de la fila seleccionada en la lista de categorias*/
$(document).ready(function () {
    $("body").on("click", "#mydata a", function (e) {
        e.preventDefault();
        idsele = $(this).attr("href");
        categorySelect = $(this).parent().parent().children("td:eq(1)").text();
        crationDateSelect = $(this).parent().parent().children("td:eq(2)").text();
        inhabilitadoSelect = $(this).parent().parent().children("td:eq(4)").text();
        //alert(categorySelect);
        $("#editIDCategory").val(idsele);
        /*Asignaba el ID a eliminar de las categorias ya no se usa*/
       // $('#idDeleteCategory').val(idsele);
        $("#editNameCategory").val(categorySelect);
        $("#inhaCategory").val(inhabilitadoSelect);

    });
});

/*Actualiza los registros de las categorias*/
$(document).ready(function () {
    $("#updateButton").click(function (e) {
        e.preventDefault();
        location.reload();
        $.ajax({
            url: 'http://localhost/RegisterParts/index.php/Category_control/updateCategory',
            type: 'POST',
            data: $("#editForm").serialize(),
            success: function (respuesta) {
                alert(respuesta);
                if (respuesta !== 'TRUE') {
                   alert('El registro no pudo ser actualizado');
                }
            }
        });
    });
});

/*Sirve para cargar nuevamente la pagina*/
function loadView(control, method) {
    $("#deleteButton").load('http://localhost/RegisterParts/index.php/' + control + '/' + method + '');
    //$("#updateButton").load('http://localhost/RegisterParts/index.php/Category_control/consultCategory');
}
/*Elimina los registros de la pantalla Category pero no se esta usando ya que fue comentado el boton*/
$(document).ready(function () {
    $("#deleteButton").click(function (e) {
        var idselectDelete = $("#idDeleteCategory").val();
        alert(idselectDelete);
        e.preventDefault();
        location.reload();
        $.ajax({
            url: 'http://localhost/RegisterParts/index.php/Category_control/deleteCategory',
            type: 'POST',
            data: {idDeSletect:1},
            success: function (respuesta) {
                alert(respuesta);
                 /*if (respuesta !== 'TRUE') {
                    alert('El registro no pudo ser eliminado');
                }*/
            }
        });
    });

});