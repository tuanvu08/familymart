<?php
session_start();
ob_start();
include('../includes/config.php');

if (isset($_POST['update'])) {
    $spc = $_POST['spc'];
    $masp = $_POST['masp'];
    $tensp = $_POST['tenspn'];
    $loaisp = $_POST['loaisp'];
    $gia = $_POST['gia'];
    $info = $_POST['info'];
    $ncc = $_POST['ncc'];
    $NoiLuu = '../FAMiLY mart/img';
    $TenFile = $_POST["fileanhdaidien"];
    $HinhDaiDien = $NoiLuu . "/" . $TenFile;
    $sqln = "UPDATE `product` SET `masp`='$masp',`tensp`='$tensp',`loaisp`='$loaisp',`gia`='$gia',`info`='$info',`ncc`='$ncc',`hinh anh`='$HinhDaiDien' WHERE `tensp`='$spc';";
    if ($conn->query($sqln)) {
        echo "<script>alert(\"sửa thông tin thành công,\"); 
            window.location.href = '../admin/quanlysanpham.php';
            </script>";
    } else {
        echo "<script>alert(\"sửa thông tin không thành công\"); 
        </script>";
    }
} elseif (isset($_POST['delete'])) {
    $xoasp = $_POST['xoasp'];
    $sqlxoa = "DELETE FROM `product` WHERE `tensp` ='$xoasp'";
    $conn->query($sqlxoa);
    echo "<script>alert(\"Xóa thông tin thành công,\"); 
            window.location.href = '../admin/quanlysanpham.php';
            </script>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAMILY MART</title>
    <link rel="shortcut icon" type="" href="../img/icon.png" />
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
        }

        * {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>
    <!-- menu -->
    <?php include 'navbar.php' ?>

    <!-- content -->
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Quản lý cửa hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa sản phẩm</li>
                        </ol>
                    </nav>
                </div>
                <hr class="hr">
            </div>
            <div class="row py-3">
                <?php
                $sp = $_POST['edit'];
                $sqldanhsachsp = "SELECT * FROM `product` WHERE `tensp`='$sp';";
                $ketquadanhsachsp = $conn->query($sqldanhsachsp);
                if ($ketquadanhsachsp->num_rows > 0) {
                    while ($row = $ketquadanhsachsp->fetch_assoc()) {
                ?>
                        <div class="col-md-3"></div>
                        <form class="col-md-6 userForm" method="post">
                            <div class="py-1">
                                <input type="hidden" class="form-control" id="spc" name="spc" value="<?= $sp ?>">
                                <div class="py-1">
                                    <label>
                                        <h5>Nhập thông tin mới :</h5>
                                    </label>
                                    <div class="py-1">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="masp" name="masp" placeholder="" value="<?php echo $row["masp"]; ?>" required>
                                            <label for="masp">Mã sản phẩm :</label>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tenspn" name="tenspn" placeholder="" value="<?php echo $row["tensp"]; ?>" required>
                                            <label for="tenspn">Tên sản phẩm :</label>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="loaisp" name="loaisp" placeholder="" value="<?php echo $row["loaisp"]; ?>" required>
                                            <label for="loaisp">Loại sản phẩm :</label>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="gia" name="gia" placeholder="" value="<?php echo $row["gia"]; ?>" required>
                                            <label for="gia">Đơn giá :</label>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <div class="form-floating mb-3">
                                            <input style="height: 100px;" type="text" class="form-control" id="info" name="info" placeholder="" value="<?php echo $row["info"]; ?>" required>
                                            <label for="info">Thông tin sản phẩm :</label>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="ncc" name="ncc" placeholder="" value="<?php echo $row["ncc"]; ?>" required>
                                            <label for="ncc">Nhà cung cấp :</label>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="fileanhdaidien" required>
                                        </div>
                                    </div>

                                    <div class="row pt-3">
                                        <div class="col"><button type="submit" class="btn btn-success" name="update">Sửa thông tin</button></div>
                                        <div class="col"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletebox">Xóa sản phẩm</button></div>
                                        <div class="col"><a href="../admin/index.php"><button type="button" class="btn">quay lại</button></a></div>
                                    </div>

                        </form>
                <?php
                    }
                } else {
                    echo "không tìm thấy sản phẩm";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="deletebox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="delete" class="col-form-label">Nhập lại tên sản phẩm muốn xóa:</label>
                                <input type="text" class="form-control" id="delete" name="xoasp" placeholder="<?= $sp ?>" required>
                                <p>LƯU Ý: Sau khi xóa sản phẩm mọi thông tin về sản phẩm sẽ biến mất và không thể khổi phục</p>
                            </div>
                            <div class="modal-footer">
                                <div class="col"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></div>
                                <div class="col"><button type="submit" class="btn btn-danger" name="delete">Xóa</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>