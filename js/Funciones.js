var statusAjax = "succes";

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
                url: getHostUrl('Password_control/sendMail'),
                success: function (result) {
                    //alert(result);
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
                url: getHostUrl('User_control/emailExist'),
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
                url: getHostUrl('User_control/userExist'),
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
        inhabilitadoSelect = $(this).parent().parent().children("td:eq(4)").text();
        $("#editIDCategory").val(idsele);
        $("#editNameCategory").val(categorySelect);
        $("#inhaCategory").val(inhabilitadoSelect);
    });
});

/*Actualiza los registros de las categorias */
$(document).ready(function () {
    $("#updateButton").click(function (e) {
        location.reload();
        $.ajax({
            url: getHostUrl('Category_control/updateCategory'),
            type: 'POST',
            data: $("#editForm").serialize(),
            success: function (respuesta) {
                if (respuesta === 'TRUE') {
                    location.reload();
                } else {
                    alert('El registro no pudo ser actualizado');
                }
            }
        });
    });
});

/*Actualiza los registros de los tipos de vehiculos de motor*/
$(document).ready(function () {
    getCampEdit("#mydataVehicleMotor", "#editVehicleMotor", "#editNameVehicleMotor", "#inhaVehicleMotor");
    $("#updateButtonVehicleMotor").click(function (e) {
        $.ajax({
            url: getHostUrl('Vehicle_motor_control/updateVehicleMotor'),
            type: 'POST',
            data: $("#editFormVehicleMotor").serialize(),
            success: function (respuesta) {
                location.reload();
            }
        });
    });
});

/*Carga Combustible modelo creacion del modelo*/
$(document).ready(function () {
    getCampEdit("#mydataCombustibleModelCreate", "#editVehicleModel", "#editNameVehicleModel",
            null);
});

/*Carga Generacion modelo creacion del modelo*/
$(document).ready(function () {
    getCampEdit("#mydataGenerationModelCreate", "#editVehicleModel", "#editNameVehicleModel",
            null);
});

/*Actualiza Combustible modelo (consulta)*/
$(document).ready(function () {
    getCampEdit("#mydataCombustibleModel", "#editVehicleModel", "#editNameVehicleModel",
            "#inhaCombustible");
    $("#updateButtonCombustibleModel").click(function () {
        if ($('#inhaCombustible').val() !== '') {
            $.ajax({
                url: getHostUrl('CombustibleModel_control/updateCombustibleModel'),
                type: 'POST',
                data: $("#editFormCombustibleModel").serialize(),
                success: function (respuesta) {
                    //alert(respuesta);
                    location.reload();
                }
            });
        } else {
            alert('Campo Obligatorio');
        }
    });

});

/*Actualiza Generacion modelo (consulta)*/
$(document).ready(function () {
    getCampEditVehicleModel("#mydataGenerationModel", "#editVehicleModel", "#editNameVehicleModel",
            "#idinhaGenerationModel", "#idstart_generatioModel", "#idend_generatioModel");
    $("#updateButtonGenerationModel").click(function () {
        if ($('#idstart_generatioModel').val() !== '' & $('#idend_generatioModel').val() !== '' & $('#idinhaGenerationModel').val() !== '') {
            $.ajax({
                url: getHostUrl('GenerationModel_control/updateGenerationModel'),
                type: 'POST',
                data: $("#editFormGenerationModel").serialize(),
                success: function (respuesta) {
                    // alert(respuesta);
                    location.reload();
                }
            });
        } else {
            alert('Campos Obligatorios');
        }
    });
});

/*Actualiza los registros de los modelos de vehiculos*/
$(document).ready(function () {
    getCampEditVehicleModel("#mydataVehicleModel", "#editVehicleModel", "#editNameVehicleModel",
            "#inhaVehicleModel", null, null);
    $("#updateButtonVehicleModel").click(function (e) {
        $.ajax({
            url: getHostUrl('VehicleModel_control/updateVehicleModel'),
            type: 'POST',
            data: $("#editFormVehicleModel").serialize(),
            success: function (respuesta) {
                alert('4545');
                //location.reload();
            }
        });
    });
});

/*Inserta los tipos de vehiculos de motor*/
$(document).ready(function () {
    $("#btnVehicleMotor").click(function (e) {
        var idCamp = "#idVehicleMotor";
        var url = getHostUrl('Vehicle_motor_control/createVehicleMotor');
        var idForm = "#vehicleMotorForm";
        insertRegyster(idCamp, url, idForm);
    });
});

/*Actualiza los registros tipos de combustibles*/
$(document).ready(function () {
    getCampEdit("#mydataCombustible", "#editCombustible", "#editNameCombustible", "#inhaCombustible");
    $("#updateButtonCombustible").click(function (e) {
        $.ajax({
            url: getHostUrl('Combustible_control/updateCombustible'),
            type: 'POST',
            data: $("#editFormCombustible").serialize(),
            success: function (respuesta) {
                //alert(respuesta);
                location.reload();
            }
        });
    });
});

/*inserta los tipos de combustibles*/
$(document).ready(function () {
    $("#btnCombustible").click(function (e) {
        var idCamp = "#idCombustible";
        var url = getHostUrl('Combustible_control/createCombustible');
        var idForm = "#combustibleForm";
        insertRegyster(idCamp, url, idForm);
    });
});

/*Inserta los modelos de las marca seleccionada*/
function insertVehicleModel() {
    var idCamp = "#idvehicleModel";
    var url = getHostUrl('VehicleModel_control/createVehicleModel');
    var idForm = "#vehicleModelForm";
    insertRegyster(idCamp, url, idForm);
}

/*Inserta los tipos de vehiculos*/
function insertTypeVehicleModel() {
    var idCamp = "#idVehicleTypeModel";
    var url = getHostUrl('VehicleType_control/createVehicleType');
    var idForm = "#typeVehicleModelForm";
    insertRegyster(idCamp, url, idForm);
}

/*Inserta combustible por modelo seleccionado*/
function insertCombustibleModel() {
    var idCamp = "#editVehicleModel";
    var idCampList = "#listCombustibleModel";
    var url = getHostUrl('CombustibleModel_control/createCombustibleModel');
    var idForm = "#editFormCombustibleModel";
    if ($(idCampList).val() !== '0') {
        insertRegyster(idCampList, url, idForm);
        hideModal('#edit');
    } else {
        alert('Campo Combustible es Obligatorio');
    }
}

/*Inserta generacion por modelo seleccionado*/
function insertGenerationModel() {
    var idCamp = "#editVehicleModel";
    var url = getHostUrl('GenerationModel_control/createGenerationModel');
    var idForm = "#editFormGenerationModel";
    if ($('#idstar_generatioModel').val() !== '' & $('#idend_generatioModel').val() !== '') {
        insertRegyster(idCamp, url, idForm);
        hideModal('#edit');
    } else {
        alert('Campos generacion son obligatorios');
    }

}

/*Actualiza marcas de vehiculos*/
$(document).ready(function () {
    getCampEdit("#mydataMake", "#editMake", "#editNameMake", "#inhaMake");
    $("#updateButtonMake").click(function (e) {
        // location.reload();
        $.ajax({
            url: getHostUrl('Make_control/updateMake'),
            type: 'POST',
            data: $("#editFormMake").serialize(),
            success: function (respuesta) {
                location.reload();
            }
        });
    });
});

/*inserta marcas de vehiculos*/
$(document).ready(function () {
    $("#btnMake").click(function (e) {
        var idCamp = "#idMake";
        var url = getHostUrl('Make_control/createMake');
        var idForm = "#makeForm";
        insertRegyster(idCamp, url, idForm);
    });
});


/*Inserta registros en la DB de manera dinamica*/
function insertRegyster(idCamp, url, idForm) {
    //var status = "Hola";
    if ($(idCamp).val() !== "") {
        $.ajax({
            url: url,
            type: 'POST',
            data: $(idForm).serialize(),
            success: function (respuesta) {
                alert(respuesta);
            },
            complete: function (jqXHR, textStatus) {

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(idCamp).val('');
                $("#idmensaje").overhang({
                    type: "error",
                    upper: false,
                    speed: 1000,
                    message: "ERROR FATAL"
                });
                console.log('ERROR DESCONOCIDO ' + jqXHR);
            }
        });
    }

}

function getCampEdit(idDataTable, idCamp, editNameSelect, mca_inha) {
    $("body").on("click", idDataTable + " a", function (e) {
        e.preventDefault();
        idsele = $(this).attr("href");
        nameSelect = $(this).parent().parent().children("td:eq(1)").text();
        inhaSelect = $(this).parent().parent().children("td:eq(4)").text();
        if (idsele > 0) {
            $(idCamp).val(idsele);
            $(editNameSelect).val(nameSelect);
            $(mca_inha).val(inhaSelect);
        }
    });
}

function getCampEditVehicleModel(idDataTable, idCamp, editNameSelect, mca_inha, editIniGenerationSelect, editEndGenerationSelect) {
    $("body").on("click", idDataTable + " a", function (e) {
        e.preventDefault();
        idsele = $(this).attr("href");
        nameSelect = $(this).parent().parent().children("td:eq(1)").text();
        iniGenerationSelect = $(this).parent().parent().children("td:eq(2)").text();
        endGenerationSelect = $(this).parent().parent().children("td:eq(3)").text();
        inhaSelect = $(this).parent().parent().children("td:eq(5)").text();
        if (idsele > 0) {
            $(idCamp).val(idsele);
            $(editNameSelect).val(nameSelect);
            $(editIniGenerationSelect).val(iniGenerationSelect);
            $(editEndGenerationSelect).val(endGenerationSelect);
            $(mca_inha).val(inhaSelect);
        }
    });
}
function getHostUrl(urlControl) {
    var hostUrl = 'http://localhost/RegisterParts/index.php/'; //'http://www.devetechnologies.com/RegisterParts/index.php/';
    return hostUrl + urlControl;
}


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
            data: {idDeSletect: 1},
            success: function (respuesta) {
            }
        });
    });

});

/*Busca los modelos por marca seleccionada*/
$(document).ready(function () {
    $("#listMakeVM").change(function () {
        getModelsForMake();
    });

});

/*Busca la generacion dependiendo de los modelos seleccionados*/
$(document).ready(function () {
    $("#listVehicleModelMV").change(function () {
        getGenerationsForModel();
    });

});

function getModelsForMake() {
    var vehicleModel = $('#listVehicleModelMV');
    var make = $("#listMakeVM");

    if (make.val() !== '') {
        $.ajax({
            data: {id: make.val()},
            url: getHostUrl('VehicleType_control/listVehicleModel'),
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                make.prop('disabled', true);
            },
            success: function (resultado) {
                console.log(resultado);
                make.prop('disabled', false);
                vehicleModel.find('option').remove();
                vehicleModel.append('<option value="0" selected>Modelos</option>');
                $(resultado).each(function (i, v) {
                    vehicleModel.append('<option value="' + v.id_model + '">' + v.model_name + '</option>');
                });
                vehicleModel.prop('disabled', false);
            },
            error: function () {
                alert('Ocurrio un error en el servidor ..');
                make.prop('disabled', false);
            },
            complete: function (jqXHR, textStatus) {
                //alert(textStatus);

            },
            timeout: 1000
        });

    } else {
        vehicleModel.find('option').remove();
        vehicleModel.prop('disabled', true);
    }
}

function getGenerationsForModel() {
    var vehicleGeneration = $('#listVehicleGeneration');
    var vehicleModel = $('#listVehicleModelMV');

    if (vehicleModel.val() !== '') {
        $.ajax({
            data: {id: vehicleModel.val()},
            url: getHostUrl('VehicleType_control/listGenerationModel'),
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                vehicleModel.prop('disabled', true);
            },
            success: function (resultado) {
                console.log(resultado);
                vehicleModel.prop('disabled', false);
                vehicleGeneration.find('option').remove();
                vehicleGeneration.append('<option value="0" selected>Generacion</option>');
                $(resultado).each(function (i, v) {
                    vehicleGeneration.append('<option value="' + v.id_generation + '">' + v.generation + '</option>');
                });
                vehicleGeneration.prop('disabled', false);
            },
            error: function () {
                alert('Ocurrio un error en el servidor ..');
                vehicleModel.prop('disabled', false);
            },
            complete: function (jqXHR, textStatus) {
                // alert(textStatus);

            },
            timeout: 1000
        });

    } else {
        vehicleGeneration.find('option').remove();
        vehicleGeneration.prop('disabled', false);
    }
}

/*Esconde el modal seleccionado*/
function hideModal(idModal) {
    $(idModal).modal('hide');
}


/*Esconde el modal seleccionado*/
function ShowModal(idModal) {
    $(idModal).modal('show');
}
