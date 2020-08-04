<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Product #ID</label>
                        <input type="text" class="form-control" name="productid" placeholder="Enter Product #ID">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="">Detail</label>
                        <input type="text" class="form-control" name="detail" placeholder="Enter Detail">
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="Enter Stock">
                    </div>
                    <!-- ภาพหลัก -->
                    <div class="form-group">
                        <label for="exampleInputFile">Image File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose Imagefile</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                        <p style="color: red;">* ภาพหลัก กรุณาใส่รูปภาพ</p>
                    </div>
                    <!-- ภาพ1 -->
                    <div class="form-group">
                        <label for="exampleInputFile">Image File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img1" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose Imagefile</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                        <p style="color: red;">* ภาพ กรุณาใส่รูปภาพ</p>
                    </div>
                    <!-- ภาพ2 -->
                    <div class="form-group">
                        <label for="exampleInputFile">Image File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img2" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose Imagefile</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                        <p style="color: red;">* ภาพ กรุณาใส่รูปภาพ</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" name="product_add" class="btn btn-primary btn-block"><i class="fas fa-folder-plus"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['product_add'])) {
    $product_id = $_POST['productid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $stock = $_POST['stock'];

    $uploaddir = 'img/product';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    $uploadfile1 = $uploaddir . basename($_FILES['img1']['name']);
    $uploadfile2 = $uploaddir . basename($_FILES['img2']['name']);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {

        $photo = "img/product" . $_FILES["img"]["name"];

        $sql_productadd = "INSERT into product (product_id, name, price, detail, stock, photo, createdAt, updatedAt) 
                            values('$product_id','$name',' $price','$detail','$stock','$photo', NOW(), NOW())";
        mysqli_query($conn, $sql_productadd) or die("insert ไม่ได้");

        // echo "<script>";
        // echo "alert('Add product successfully');";
        // echo "window.location='product.php';";
        // echo "</script>";
    }
    $id = mysqli_insert_id($conn);

    if (move_uploaded_file($_FILES['img1']['tmp_name'], $uploadfile1)) {

        $photo1 = "img/product" . $_FILES["img1"]["name"];

        $sql_productadd = "UPDATE product SET  `photo1` ='$photo1' WHERE `id` = '$id'";
        mysqli_query($conn, $sql_productadd) or die("insert ไม่ได้");
    }
    if (move_uploaded_file($_FILES['img2']['tmp_name'], $uploadfile2)) {

        $photo2 = "img/product" . $_FILES["img2"]["name"];

        $sql_productadd = "UPDATE product SET  `photo2` ='$photo2' WHERE `id` = '$id'";
        mysqli_query($conn, $sql_productadd) or die("insert ไม่ได้");
    }
    echo '
    <script language="JavaScript">
        swal({
            title: "Successfully",
            text: "Add product list",
            icon: "success",
            button: false,
        });
    </script>';
    echo '<meta http-equiv="refresh" content="2; url=product" />';
}
?>