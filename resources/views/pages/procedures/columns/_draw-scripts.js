// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document
    .querySelectorAll('[data-kt-action="delete_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Swal.fire({
                text: "Esta seguro que desea eliminar este Procedimiento?",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "No",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(
                        "delete_procedure",
                        this.getAttribute("data-kt-procedure-id")
                    );
                }
            });
        });
    });

// Add click event listener to update buttons
document
    .querySelectorAll('[data-kt-action="update_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Livewire.emit(
                "update_procedure",
                this.getAttribute("data-kt-procedure-id")
            );
        });
    });

// Add click event listener to update buttons
document
    .querySelectorAll('[data-kt-action="view_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Livewire.emit(
                "view_procedure",
                this.getAttribute("data-kt-procedure-id")
            );
        });
    });

// Add click event listener to update buttons
document
    .querySelectorAll('[data-kt-action="create_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Livewire.emit("create_procedure");
        });
    });

// Listen for 'success' event emitted by Livewire
Livewire.on("success", (message) => {
    // Reload the patients-table datatable
    LaravelDataTables["procedures-table"].ajax.reload();
});
