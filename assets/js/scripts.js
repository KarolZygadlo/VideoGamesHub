$(document).ready(function () {
    $('#dtMaterialDesignExample').DataTable();
    $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        const $this = $(this);
        $this.attr("placeholder", "Search");
        $this.removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass(
        'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});


tinymce.init({
    selector: '.tinymce',
    paste_as_text: true,
    plugins: 'table print preview fullscreen image imagetools emoticons anchor link lists advlist format wrap autolink charmap code paste',
    advlist_bullet_styles: "square",
    menubar: 'file view insert edit format table',
    toolbar: 'undo redo bold italic forecolor backcolor align lists numlist bullist link image emoticons print preview fullscreen outdent indent',
    valid_elements: '*[*]',
    height: 400,
    setup: function (editor) {
        editor.on('change', function (e) {
            editor.save();
        });
    }
});

