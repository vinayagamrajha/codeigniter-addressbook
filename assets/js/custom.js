$(document).ready(function() {
    $("#add_email,#add_phone").click(function(e) {
        e.preventDefault();
        if (this.id == "add_email") {
            field = '<input type="email" name="email_address[]"';
            wrapper = $("#email");
        }
        if (this.id == "add_phone") {
            field = '<input type="text" name="contact_number[]"';
            wrapper = $("#phone");
        }
        $(wrapper).append(field + 'class="form-control"><a href="javascript:void(0);" class="remove_field">Remove</a>');

    });
    //when user click on remove button
    $(".add_contact").on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).prev("input").remove();
        $(this).remove();

    })
    $('#address_book').DataTable({
        "ordering": false,
        "info": false

    });
    //contact form validation
    $("#add_contact").validate({
        rules: {
            first_name: {
                required: true,
                maxlength: 25
            },
            last_name: {
                required: true,
                maxlength: 25
            },
            'contact_number[]': {
                required: true,
                number: true,
                maxlength: 10
            },
            'email_address[]': {
                required: true,
                email: true
            },

        },
    });
});

//delete contact
function delete_contact() {
    if (confirm("Are you sure you want to delete?")) {
        return true;
    }
    return false;
}