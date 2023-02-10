<!DOCTYPE html>
<html>
<head>
    <title>Membuat Modal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="container">        
    <!-- Button yang digunakan untuk menampilkan modal-->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buka Sebuah Modal</button>
 
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ini adalah heading dari Modal</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <p>Ini bagian body dari modal</p>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Button Untuk Menutup Modal</button>
                </div>
            </div>
        </div>
    </div>
   </div>
</body>
</html>