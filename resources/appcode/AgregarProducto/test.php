<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
$(document).ready(function() {
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    });
});
</script>
<form method="post" action="#" enctype="multipart/form-data">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="images/default-avatar.png">
        <div class="card-body">
            <h5 class="card-title">Sube una foto</h5>
            <p class="card-text">Sube una imagen...</p>
            <div class="form-group">
                <label for="image">Nueva imagen</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <input type="button" class="btn btn-primary upload" value="Subir">
        </div>
    </div>
</form>