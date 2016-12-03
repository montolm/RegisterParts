/*Valida formulario user*/
$(document).ready(function () {
    $('#loginForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'El apellido es requerido'
                    }
                }
            },
            user: {
                validators: {
                    notEmpty: {
                        message: 'El usuario es requerido'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'La clave es requerida'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'Confirma es requerido'
                    },
                    identical: {
                        field: 'password',
                        message: 'Contraseña y confirmación no son iguales'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido'
                    },
                    emailAddress: {
                        message: 'El formato es incorrecto'
                    }
                }
            }
        }
    });
});
/*Valida formulario manager*/
$(document).ready(function () {
    $('#formmanager').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'El apellido es requerido'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'La dirección es requerida'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'El telefono es requerido'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido'
                    },
                    emailAddress: {
                        message: 'El formato es incorrecto'
                    }
                }
            },
            identification: {
                validators: {
                    notEmpty: {
                        message: 'La identificación es requerida'
                    }
                }
            },
            birthdate: {
                validators: {
                    notEmpty: {
                        message: 'La fecha es requerida'
                    }
                }
            },
            experience: {
                validators: {
                    notEmpty: {
                        message: 'La experiencia es requerida'
                    }
                }
            }

        }
    });
});

/*Valida formulario correo(Olvido contraseña)*/
$(document).ready(function () {
    $('#emailform').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido'
                    },
                    emailAddress: {
                        message: 'El formato es incorrecto'
                    }
                }
            }
        }

    });
});

/*Valida formulario category*/
$(document).ready(function () {
    $('#categoryForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            categoria: {
                validators: {
                    notEmpty: {
                        message: 'Categoria Obligatoria'
                    }
                }
            }
        }

    });
});

/*Valida formulario vehiculo motor*/
$(document).ready(function () {
    $('#vehicleMotorForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            vehicleMotor: {
                validators: {
                    notEmpty: {
                        message: 'Tipo de vehiculo obligatorio'
                    }
                }
            }
        }

    });
});

/*Valida formulario category al editar*/
$(document).ready(function () {
    $('#editForm').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nameCategory: {
                validators: {
                    notEmpty: {
                        message: 'Campo Obligatorio'
                    }
                }
            },
            inhaCategory: {
                validators: {
                    notEmpty: {
                        message: 'Campo Obligatorio'
                    }
                }
            }
        }

    });
});
/*Valida formulario de los Modelos de vehiculos*/
$(document).ready(function () {
    $('#vehicleModelForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            selectVehicleModel: {
                validators: {
                    greaterThan: {
                        value:1,
                        message: 'Campo obligatorio'
                    }
                }
            },
            vehicleModel: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    }
                }
            },
            star_generatioModel: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: /^\d{4}$/,
                        message: 'Formato incorrecto'
                    }
                }
            },
//            datetimepickerMes: {
//                validators: {
//                    notEmpty: {
//                        message: 'La fecha de nacimiento no puede ser vacia'
//                    },
//                    regexp: {
//                        regexp: /^(0[1-9])|(1[0-2])$/,
//                        message: 'La fecha de nacimiento no es valida'
//                    }
//                }
//            },
            end_generatioModel: {
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio'
                    },
                    regexp: {
                        regexp: /^\d{4}$/,
                        message: 'Formato Incorrecto'
                    }
                }
            }
        }

    });

});

