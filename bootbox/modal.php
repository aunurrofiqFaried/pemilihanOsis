<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My page</title>

    <!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
</head>
<body>

    <p>Content here. <a class="show-alert" href=#>Alert!</a></p>
    <button class="yanna">proses</button>
    <br>
    <button class="dzakwan"onclick="dzakira('imron')">Dzakwwan</button>

    <!-- JS dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap 4 dependency -->
    <script src="../dist/css/popper.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>

    <!-- bootbox code -->
    <script src="bootbox.min.js"></script>
    <script src="bootbox.locales.min.js"></script>
    <script>
        $(document).on("click", ".yanna", function(e) {
            bootbox.confirm({
               
    message: "This is a confirm with custom button text and color! Do you like it?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        console.log('This was logged in the callback: ' + result);
        if(result){
            //alert(.show-alert);
          
        }
    }
});
            
        });
    </script>
    <script>
        function dzakira(nama) {
            bootbox.confirm({
               
    message: "Anda yakin memilih "+nama,
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        console.log('This was logged in the callback: ' + result);
        if(result){
          //  alert(nama);
            window.location.href="simpan.php?nama="+nama;
        }
    }
});
            
        }
    </script>
</body>
<a href=”LinkHapusnya” onclick=”return confirm(‘Yakin Hapus?’)”>Hapus</a>
</html>