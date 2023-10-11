// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document
    .querySelectorAll('[data-kt-action="delete_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Swal.fire({
                text: "Esta seguro que desea eliminar este Doctor?",
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
                        "delete_doctor",
                        this.getAttribute("data-kt-doctor-id")
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
                "update_doctor",
                this.getAttribute("data-kt-doctor-id")
            );
        });
    });

// Add click event listener to update buttons
document
    .querySelectorAll('[data-kt-action="view_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Livewire.emit(
                "view_doctor",
                this.getAttribute("data-kt-doctor-id")
            );
        });
    });

// Add click event listener to update buttons
document
    .querySelectorAll('[data-kt-action="create_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Livewire.emit("create_doctor");
        });
    });

// Listen for 'success' event emitted by Livewire
Livewire.on("success", (message) => {
    // Reload the patients-table datatable
    LaravelDataTables["doctors-table"].ajax.reload();
});
