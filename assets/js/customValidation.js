$(function () {
    // sends the uploaded file file to the fielselect event
    $(document).on('change', ':file', function () {
        var input = $(this);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    // Set the label of the uploaded file
    $(':file').on('fileselect', function (event, label) {
        $(this).closest('.uploaded-file-group').find('.uploaded-file-name').val(label);
    });
    
    // Deals with the upload file in edit mode
    $('.custom-delete-file:checkbox').change(function (e) {
        var self = $(this);
        var container = self.closest('.input-width-input');
        var display = container.find('.custom-delete-file-name');
        var flag = container.find('.custom-delete-flag:checkbox');
        if (self.is(':checked')) {
            display.wrapInner('<del></del>');
            flag.prop('checked', true);
        } else {
            var del = display.find('del').first();
            if (del.is('del')) {
                flag.prop('checked', false);
                del.contents().unwrap();
            }
        }
    }).change();
    
    // Sets the validator defaults
    $.validator.setDefaults({
        errorElement: "div",
        highlight: function (element, errorClass, validClass) {
            $(element).closest('.form-control').addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
        },
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else if (element.prop('type') === 'checkbox' || element.prop('type') ===
                'radio') {
                error.appendTo(element.closest(':not(input, label, .checkbox, .radio)')
                    .first());
            } else {
                error.insertAfter(element);
            }
        }
    });
   
    // Makes sure any input with the required class is actually required
    $('form').each(function (index, item) {
        var form = $(item);
        form.find(':input.required').each(function (i, input) {
            $(input).attr('required', true);
        });
    });

});
