window.addEventListener('load', function () {
    document.getElementById('photo_1').addEventListener('change', function () {
        document.getElementById('photoViewer_1').innerHTML = '<i class="fas fa-spinner fa-pulse loader"></i>';
  
        if (this.files && this.files[0]) {
            var img = document.querySelector('img');
            img.src = URL.createObjectURL(this.files[0]);
            setTimeout(function () {
                img.onload = imageIsLoaded;
                var photoName = document.getElementById('photo_1').value;
                document.getElementById('photoViewer_1').innerHTML = '<img class="img-fluid img-thumbnail" src="' + img.src + '" width="75%">';
                document.getElementById('name_photo_1').value = photoName.replace(/^.*[\\\/]/, '');
            }, 500);
        }
    });
  });
  
  window.addEventListener('load', function () {
    document.getElementById('photo_2').addEventListener('change', function () {
        document.getElementById('photoViewer_2').innerHTML = '<i class="fas fa-spinner fa-pulse loader"></i>';
  
        if (this.files && this.files[0]) {
            var img = document.querySelector('img');
            img.src = URL.createObjectURL(this.files[0]);
            setTimeout(function () {
                img.onload = imageIsLoaded;
                var photoName = document.getElementById('photo_2').value;
                document.getElementById('photoViewer_2').innerHTML = '<img class="img-fluid img-thumbnail" src="' + img.src + '" width="75%">';
                document.getElementById('name_photo_2').value = photoName.replace(/^.*[\\\/]/, '');
            }, 500);
        }
    });
  });

  window.addEventListener('load', function () {
    document.getElementById('photo_logo').addEventListener('change', function () {
        document.getElementById('photoViewer_logo').innerHTML = '<i class="fas fa-spinner fa-pulse loader"></i>';
  
        if (this.files && this.files[0]) {
            var img = document.querySelector('img');
            img.src = URL.createObjectURL(this.files[0]);
            setTimeout(function () {
                img.onload = imageIsLoaded;
                var photoName = document.getElementById('photo_logo').value;
                document.getElementById('photoViewer_logo').innerHTML = '<img class="img-fluid img-thumbnail" src="' + img.src + '" width=74>';
                document.getElementById('name_photo_logo').value = photoName.replace(/^.*[\\\/]/, '');
            }, 500);
        }
    });
  });
  
  function imageIsLoaded(e) { }