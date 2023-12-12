<!DOCTYPE html>
<html lang="en">
    <head>
        @include('tema-admin.head')
    </head>

    <body>
        <div class="main-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar">
                <div class="sidebar-header hilang_gap" style="background-color:#1b1742">
                    <a href="#" class="sidebar-brand" style="background-color:#1b1742">
                        <img src="{{ asset('logo/logo-cahlez.png') }}" width="100px"/>
                    </a>

                    <div class="sidebar-toggler not-active" >
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                @include('tema-admin.menu')
                <!-- partial -->
                <div class="page-wrapper" >

                    <!-- partial:../../partials/_navbar.html -->
                    @include('tema-admin.navbar')
                    <!-- partial -->

                    <div class="page-content" >
                    @yield('content')
                    <!-- MAIN CONTENT -->
                    </div>
                </div>
            </navbar>
        </div>
    </body>
</html>

<!-- core:js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<script src="{{ asset('admin/assets/vendors/core/core.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/template.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/4rz2jr6pppeuktgimrteby3pax3yz4xomhawkbjfnqji46ha/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

<!-- datatable -->
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<script src="{{ asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Validate -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<!-- Sweet alert2 -->
<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

<!-- datepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

@stack('scripts')

<script>

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

 tinymce.init({
    selector: 'textarea.tini',
    plugins: 'powerpaste casechange searchreplace autolink directionality advcode visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap emoticons advtable export autosave',
    toolbar: 'undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat',
    image_title: true,
    automatic_uploads: true,
    height: 300,
    file_picker_types: 'image',
    relative_urls : false,
    remove_script_host : false,
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },
    content_style: "body {  font-size: 11pt; font-family: Arial; }",
});

function hapus(url)
{
    if (confirm("Apakah Anda yakin akan hapus data ini ?") == true) {
        var url = url;
     
        $.ajax({
            type:"DELETE",
            url : url,
            data: {
                _token : "{{ csrf_token() }}",
            },

            dataType: 'json',
            success: function(res){
                var oTable = $('#table').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}

function readURL(input, id)
{
    id = id || '#modal-preview';
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        $('#modal-preview').removeClass('hidden');
        $('#start').hide();
    }
}
</script>
