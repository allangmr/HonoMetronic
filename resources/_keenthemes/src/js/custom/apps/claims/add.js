"use strict";

// Class definition
var KTclaimsAddclaims = (function () {
    // Shared variables
    const element = document.getElementById("kt_modal_add_claim");
    const form = element.querySelector("#kt_modal_add_claim_form");
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initAddclaim = () => {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(form, {
            fields: {
                claim_name: {
                    validators: {
                        notEmpty: {
                            message: "Nombre de reclamo es requerido",
                        },
                    },
                },
            },

            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: "",
                }),
            },
        });

        // Submit button handler
        const submitButton = element.querySelector(
            '[data-kt-claims-modal-action="submit"]'
        );
        submitButton.addEventListener("click", (e) => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log("validated!");

                    if (status == "Valid") {
                        // Show loading indication
                        submitButton.setAttribute("data-kt-indicator", "on");

                        // Disable button to avoid multiple click
                        submitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute("data-kt-indicator");

                            // Enable button
                            submitButton.disabled = false;

                            // Show popup confirmation
                            Swal.fire({
                                text: "Se agrego el Reclamo de Forma Correcta!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Continuar",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    modal.hide();
                                }
                            });

                            //form.submit(); // Submit form
                        }, 2000);
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Lo sentimos, se produjo un error. Intente Nuevamente.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Cerrar",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    }
                });
            }
        });

        // Cancel button handler
        const cancelButton = element.querySelector(
            '[data-kt-claims-modal-action="cancel"]'
        );
        cancelButton.addEventListener("click", (e) => {
            e.preventDefault();

            Swal.fire({
                text: "Esta seguro que desea salir?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Salir",
                cancelButtonText: "No, Continuar",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light",
                },
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide();
                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        text: "El envio de su formulario, no fue cancelado!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                }
            });
        });

        // Close button handler
        const closeButton = element.querySelector(
            '[data-kt-claims-modal-action="close"]'
        );
        closeButton.addEventListener("click", (e) => {
            e.preventDefault();

            Swal.fire({
                text: "Esta seguro que desea salir?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Salir!",
                cancelButtonText: "No, Continuar",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light",
                },
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide();
                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        text: "El envio de su formulario, no fue cancelado!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Continuar",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                }
            });
        });
    };

    return {
        // Public functions
        init: function () {
            initAddclaim();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTclaimsAddclaims.init();
});
