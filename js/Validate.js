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