$(document).ready(function(){
        $('#foto').fileinput({
            lenguaje: 'es',
            allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            maxFileSize: 1000,
            showUpload: false,
            showClose: false,
            showRemove: false,
            showCancel: false,
            showCaption: false,
            showDescriptionClose: false,
            initialPreviewAsData: true,
            previewZoom: false,
            dropZoneEnabled: false,
            zoomCache: false,
            theme: "fas",
        });
});

function fotoFunctionJS(){
    var checkBox = document.getElementById("checkboxFoto");
  // Get the output text
    var x = document.getElementById("inputFoto");

  // If the checkbox is checked, display the output text
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}