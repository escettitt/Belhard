@extends('layouts.editor')
@section('content')
<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
<form id="form" method="post" action="/editor/post">
    <input type="hidden" id="token" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="text" id="header" class="input__post input_header" name="post_header" placeholder="Название..." />
    <input type="text" id="description" class="input__post input_description" name="post_description"
        placeholder="Описание...">
    <div id="editor" class="mt-2">

    </div>
    <div class="button mt-2" id="submit">Создать пост</div>
</form>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Initialize Quill editor -->
<script>
var toolbarOptions = [
    [{
        'header': [1, 2, 3, 4, false]
    }],
    ['bold', 'italic', 'underline', 'strike'],
    ['link', 'image'],
    ['blockquote', 'code-block'],
    [{
        'list': 'ordered'
    }, {
        'list': 'bullet'
    }],
    [{
        'indent': '-1'
    }, {
        'indent': '+1'
    }],
    [{
        'color': []
    }, {
        'background': []
    }],
    [{
        'align': []
    }],
    ['clean']

];
var editor = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: 'Введите текст...',
    theme: 'snow'
});
</script>
<script>
$('#submit').click(function(e) {
    e.preventDefault();
    var form = $('#form')
    var token = $('#token')
    var header = $('#header')
    var description = $('#description')
    var allImages = document.getElementsByTagName('img');
    var formData = new FormData()
    formData.append('post_header', header.val())
    formData.append('post_description', description.val())
    formData.append('_token', token.val())
    for (let i = 0; i < allImages.length; i++) {
        var image = allImages[i].src
        var ext = image.substring("data:image/".length, image.indexOf(";base64"))
        var filename = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2,
        15) + '.' + ext;
        formData.append('post_images[]', JSON.stringify({name: filename, data: image}))
        allImages[i].src = '/storage/'+filename
        if(i == 0){
            allImages[0].remove()
        }
    }
    var body = document.getElementsByClassName('ql-editor')[0].innerHTML
    formData.append('post_body', body)
    $.ajax({
        url: form.attr('action'),
        data: formData,
        type: 'post',
        processData: false,
        contentType: false,
        success: function(data) {
            console.log(data)
        },
        headers: {
            'X-CSRF-TOKEN': token.val()
        }
    })
});
</script>
<script>
    function dataURLtoFile(dataurl, ext) {
    var filename = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename + '.' + ext, {
        type: mime
    });
}
</script>
<style>
.ql-container {
    height: 50vh;
}
.ql-toolbar{
    margin-top: 1rem !important;
}
</style>
@stop