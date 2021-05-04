<?php
session_start();
$user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap css-->
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="sylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="hotel.css">
        <!-- Bootstrap javascript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>

    <title>ADMINISTRATOR</title>
</head>
<body>
<!-- Navbar -->
<section>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: goldenrod;">
    <a class="navbar-brand" href="#" style="color: black"> <img src="img/sky.png" style="width: 30px; height: 30px;">SkyLight</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <div class="navbar-nav" >
            <a class="nav-item nav-link active" href="#"><h5><i class="fas fa-bell " style="color: black"></i></h5></a>
            <a class="nav-item nav-link" href="#"><h5><i class="fas fa-comment " style="color: black"></i></h5></a>
            <a class="nav-item nav-link" data-toggle="dropdown" id="dropdownMenuButton" href=""><h5><i class="fas fa-user-circle " style="color: black"></i></h5></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" ><?php echo $user;?></a>
                    <a class="dropdown-item" href="logout.php">Log Out </a>
                </div>
        </div>
    </div>
</nav>
</section>
<!-- Akhir Navbar -->
<!-- Sidebar -->
<div class="row no-gutters mt-5" >
            <div class="col-md-2 mt-2 pr-3 pt-4" style="background-color: goldenrod;">
                <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="admin.php"><i class="fas fa-user-cog mr-2"></i>Daftar Admin</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="akun_pengguna.php"><i class="fas fa-user-shield mr-2"></i>Daftar Akun Pengguna</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="datahotel.php" ><i class="fas fa-hotel mr-2"></i>Data Hotel</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="datapengguna.php" ><i class="fas fa-users mr-2"></i>Data Pengguna</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="pesan.php" ><i class="fas fa-sticky-note mr-2"></i>Data Pesan</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="kamar.php" ><i class="fas fa-bed mr-2"></i>Data Kamar</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="slideshow.php" ><i class="fas fa-tv mr-2"></i>Slide Show</a><hr class="bg-secondary">
                </li>
                </ul>
            </div>
<!-- Akhir SideBar -->
<!-- Data -->
<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-sticky-note mr-2"></i>Data Pesan</h3><hr>
    <form class="form-inline my-2 my-lg-0 ml-auto">
            <a href="#" id="tambahpen" class="btn mb-2 btndata"><i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA PESAN</a>
            <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search" name="cari" style="margin-left: 34em;margin-bottom:0.7em">
            <button class="btn btn search2" style="margin-bottom: 0.7em" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <table class="table table-striped table-bordered textactive">
        <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">ID Pesan</th>
            <th scope="col">ID Pengguna</th>
            <th scope="col">ID Kamar</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Check In</th>
            <th scope="col">Check Out</th>
            <th scope="col">Jumlah Tamu</th>
            <th scope="col">Jumlah Kamar</th>
            <th scope="col">Total Harga</th>
            <th colspan="3" scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $no = 1;
            $sql = mysqli_query($koneksi, "SELECT pesan.idpesan,pesan.idpengguna, detailpesan.idkamar,pesan.PilihHotel,pesan.CheckIn,pesan.CheckOut,pesan.JumlahTamu,pesan.JumlahKamar,pesan.totalharga FROM detailpesan, pesan WHERE detailpesan.idpesan = pesan.idpesan ");
            while($data = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['idpesan']; ?></td>
                <td><?php echo $data['idpengguna']; ?></td>
                <td><?php echo $data['idkamar']; ?></td>
                <td><?php echo $data['PilihHotel']; ?></td>
                <td><?php echo $data['CheckIn']; ?></td>
                <td><?php echo $data['CheckOut']; ?></td>
                <td><?php echo $data['JumlahTamu']; ?></td>
                <td><?php echo $data['JumlahKamar']; ?></td>
                <td><?php echo $data['totalharga']; ?></td>
                <td>
                <a href="#" data-role="pop" data-id="<?php echo $data['idpesan'];?>"><i class="fas fa-edit bg-success p-2 text-white rounded"></i></a>
                <a href="#" data-role="pop2" data-id ="<?php echo $data['idpesan'];?>"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i></a>
                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="update_pesan.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >ID Pesan</label>
                                    <input type="text" name="idpesan" class="form-control" id="idpesan" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >ID Pengguna</label>
                                    <input type="text" name="idpengguna" class="form-control" id="idpengguna" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >ID Kamar</label>
                                    <input type="text" name="idkamar" class="form-control" id="idkamar">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Pilih Hotel</label>
                                    <input type="text" name="PilihHotel" class="form-control" id="PilihHotel">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Check In</label>
                                    <input type="text" name="CheckIn" class="form-control" id="CheckIn">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Check Out</label>
                                    <input type="text" name="CheckOut" class="form-control" id="CheckOut">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Jumlah Tamu</label>
                                    <input type="text" name="JumlahTamu" class="form-control" id="JumlahTamu">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Jumlah Kamar</label>
                                    <input type="text" name="JumlahKamar" class="form-control" id="JumlahKamar">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Total Harga</label>
                                    <input type="text" name="totalharga" class="form-control" id="totalharga">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button> -->
                                <button type="submit" class="btn btn-light">SIMPAN</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- /Modal Edit -->
            <?php
            }
            ?>
        </tbody>
        </table>
                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="delete_pesan.php" method="post">
                            Apakah anda yakin ingin menghapus data <b id="datadel"></b>? 
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button> -->
                            <input type="hidden" name="datadel" id="datadel2">
                            <button type="submit" class="btn btn-light">DELETE</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                <!-- /ModalDelete -->
        </tbody>
    </table>
</div>
</div>
<!-- Akhir Data -->
<!-- Modal Tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input New Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form action="simpan_pesan.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >ID Pesan</label>
                                    <input type="text" name="idpesan" class="form-control" id="idpesan" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >ID Pengguna</label>
                                    <input type="text" name="idpengguna" class="form-control" id="idpengguna" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >ID Kamar</label>
                                    <input type="text" name="idkamar" class="form-control" id="idkamar">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Pilih Hotel</label>
                                    <input type="text" name="PilihHotel" class="form-control" id="PilihHotel">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Check In</label>
                                    <input type="text" name="CheckIn" class="form-control" id="CheckIn">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Check Out</label>
                                    <input type="text" name="CheckOut" class="form-control" id="CheckOut">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Jumlah Tamu</label>
                                    <input type="text" name="JumlahTamu" class="form-control" id="JumlahTamu">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Jumlah Kamar</label>
                                    <input type="text" name="JumlahKamar" class="form-control" id="JumlahKamar">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Total Harga</label>
                                    <input type="text" name="totalharga" class="form-control" id="totalharga">
                                </div>
                            </div>
            <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
            <button type="submit" class="btn btn-light">SIMPAN</button>
        </form>
    </div>
</div>
</div>
</div>
<!-- /Modah Tambah -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        // Tambah
        $("#tambahpen").click(function(){
            $("#ModalTambah").modal();
        });
        // Edit
        $("a[data-role=pop]").click(function(){
            var id=$(this).data("id"); 
            console.log(id);

            // $("#Modalea").modal();
            $.ajax({
                type:'POST',
                url: 'getpesan.php',
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $('#ModalEdit').modal();
                    var row = JSON.parse(data);
                    console.log(row['idpesan']);
                    $("#idpesan").val(row['idpesan']);
                    $("#idpengguna").val(row['idpengguna']);
                    $("#idkamar").val(row['idkamar']);
                    $("#PilihHotel").val(row['PilihHotel']);
                    $("#CheckIn").val(row['CheckIn']);
                    $("#CheckOut").val(row['CheckOut']);
                    $("#JumlahTamu").val(row['JumlahTamu']);
                    $("#JumlahKamar").val(row['JumlahKamar']);
                    $("#totalharga").val(row['totalharga']);
                }
            });
        });
        // Hapus
        $("a[data-role=pop2]").click(function(){
            var id=$(this).data("id"); 
            console.log(id);
            $.ajax({
                type:'POST',
                url: 'getpesan.php',
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $("#ModalDelete").modal();
                    var row = JSON.parse(data);
                    console.log(row['idpesan']);
                    $("#datadel2").val(row['idpesan']);
                    $("#datadel").text(row['idpesan']);
                    
                }
            });
        });
    </script>
</body>
</html>