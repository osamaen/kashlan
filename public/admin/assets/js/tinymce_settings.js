tinymce.init({
    selector: '.textarea_rtl', theme: "modern", height: 300,
    menubar: false,
    plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor filemanager"],
    image_advtab: true,
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist  outdent indent | link image media filemanager | forecolor backcolor | table | code  preview print ',
    language: 'ar',
    directionality: 'rtl',
    //content_css : "dist/css/my_tiny_styles.css",

});

tinymce.init({
    selector: '.textarea_ltr', theme: "modern", height: 300,
    menubar: false,
    plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor filemanager"],
    image_advtab: true,
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist  outdent indent | link image media filemanager | forecolor backcolor | table | code  preview print ',

    language: 'en',
    directionality: 'ltr',
    //content_css: "dist/css/my_tiny_styles_en.css",

});

