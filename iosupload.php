<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt_BR" lang="pt_BR">
<head>
<title>iOS6 html5 Upload</title>
</head>
<body>
	
Video
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file" accept="video/*" capture>
  <input type="submit" value="Upload">
</form>

Foto e Video
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file" accept="audio/*" capture>
  <input type="submit" value="Upload">
</form>

Foto
<input type="file" accept="image/*" capture>
<canvas></canvas>

<script>
var input = document.querySelector('input[type=file]');

input.onchange = function () {
  var file = input.files[0];

  upload(file);
  drawOnCanvas(file);
  displayAsImage(file);
};

function upload(file) {
  var form = new FormData(),
      xhr = new XMLHttpRequest();

  form.append('file', file);
  xhr.open('post', 'upload.php', true);
  xhr.send(form);
}

function drawOnCanvas(file) {
  var reader = new FileReader();

  reader.onload = function (e) {
    var dataURL = e.target.result,
        c = document.querySelector('canvas'),
        ctx = c.getContext('2d'),
        img = new Image();

    img.onload = function() {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };

    img.src = dataURL;
  };

  reader.readAsDataURL(file);
}

function displayAsImage(file) {
  var imgURL = URL.createObjectURL(file),
      img = document.createElement('img');

  img.onload = function() {
    URL.revokeObjectURL(imgURL);
  };

  img.src = imgURL;
  document.body.appendChild(img);
}
</script>
</body>
