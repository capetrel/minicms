$('#editor').trumbowyg({
    lang: 'fr',
    imageWidthModalEdit: true,
    btns: [
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['strong', 'italic', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        // ['insertImage'],
        ['upload'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ],
    autogrow: true,
    plugins: {
        upload: {
            // Some upload plugin options, see details below
            serverPath: '/admin/image/upload',
        }
    }
});
