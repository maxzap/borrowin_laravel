'use strict';
$(document).ready(function() {
    $('#clear').on('click', function() {
        $('#tryitForm1,  #tryitForm').bootstrapValidator("resetForm");
    });

    $('#tryitForm').bootstrapValidator({
        fields: {
            firstName: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa tu nombre'
                    }
                }
            },
            pais: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su país'
                    }
                }
            },
            password: {
                validators: {

                    notEmpty: {
                        message: 'Ingrese su contraseña'
                    }
                }
            },
            confirmpassword: {
                validators: {
                    notEmpty: {
                        message: 'Confirme su contraseña'
                    },
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas no coinciden'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su e-mail'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'No es un e-mail valido'
                    }
                }
            },
        },
        submitHandler: function(form) {
            if ($('#tryitForm1').valid()) {
                console.log("now we enable the submit button!");
            }
        }
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        swal({
            title: "Success.",
            text: "Successfully Added",
            type: "success",
            allowOutsideClick: false
        }).then(function() {
            location.reload();
        });
    });
});
