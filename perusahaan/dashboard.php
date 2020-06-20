<?php
session_start();
require('../require/koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap4.min.css">
    <link href="../css/bootstrap-select.min.css" rel="stylesheet">
    <title>Bursa Kerja</title>
</head>

<body>
    <div class="wrapper">
        <div class="top-navbar">
            <div class="brand">Bursa <span>SAW</span></div>
            <div class="menu">
                <div class="profile-wrap">
                    <div class="profile">
                        <span class="name"> Hi, <?php echo ucfirst($_SESSION["username"]) ?></span>
                        <a href="?menu=logout"><span class="logout btn btn-success btn-sm" href="?menu=logout"><i class="fas fa-sign-out-alt"></i> Logout</span></a>
                    </div>
                    <!-- <h6>
                            <a href="#" class="name text-white" style="text-decoration: none;"></a>
                            <a class="logout text-white btn btn-dark btn-sm" style="text-decoration: none;" href="?menu=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </h6> -->
                </div>
            </div>
        </div>

        <div class="row no-gutters mt-5">
            <!-- sidebar -->
            <?php include("sidebar.php") ?>

            <!-- .sidebar -->
            <?php include("menu.php") ?>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="../bootstrap/js/jquery-3.4.1.slim.min.js"></script>
            <script src="../js/jquery-3.5.1.min.js"></script>
            <script src="../bootstrap/js/popper.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
            <script src="../bootstrap/js/jquery.dataTables.min.js"></script>
            <script src="../bootstrap/js/dataTables.bootstrap4.min.js"></script>
            <script src="../js/bootstrap-select.min.js"></script>
            <script>
                // Call the dataTables jQuery plugin
                $(document).ready(function() {
                    $('#dataTables').DataTable();
                });

                // javascript menampilkan nama file pada componen input file
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });

                $('.customx-select').ready(function() {

                    let id_lowongan = $('#id_lowongan').val();
                    $.ajax({
                        url: "<?php echo "get_jurusan.php" ?>",
                        method: "POST",
                        data: {
                            id: id_lowongan
                        },
                        cache: false,
                        success: function(res) {
                            // return false;
                            let item = res;
                            let val1 = item.replace("[", "");
                            let val2 = val1.replace("]", "");
                            let values = val2;
                            $.each(values.split(","), function(i, e) {
                                $(".customx-select option[value='" + e + "']").prop("selected", true).trigger('change');
                                $(".customx-select").selectpicker('refresh');
                            });
                        }
                    });
                });

                $('.customx-select').on('change', function() {
                    if ($(this).val() == "") {
                        $(this).attr("placeholder", "Jurusan");
                    }
                });
            </script>
</body>

</html>