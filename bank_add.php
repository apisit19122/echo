<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bank Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="">Namebank</label>
                        <input type="text" class="form-control" name="namebank" placeholder="Enter Namebank">
                    </div>
                    <div class="form-group">
                        <label for="">Account</label>
                        <input type="number" class="form-control" name="account" placeholder="Enter Account">
                    </div>
                    <div class="form-group">
                        <label for="">Promptpay</label>
                        <input type="number" class="form-control" name="promptpay" placeholder="Enter Promptpay">
                    </div>
                    <!-- ภาพห -->
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
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" name="bank_add" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['bank_add'])) {
    $name = $_POST['name'];
    $namebank = $_POST['namebank'];
    $account = $_POST['account'];
    $promptpay = $_POST['promptpay'];

    $uploaddir = 'img/money/';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {

        $photo = "img/money/" . $_FILES["img"]["name"];

        $sql_bankadd = "INSERT into bank (name, namebank, account, promptpay, photo, createdAt, updatedAt) 
                            values('$name','$namebank',' $account','$promptpay','$photo', NOW(), NOW())";
        mysqli_query($conn, $sql_bankadd) or die("insert ไม่ได้");

        echo "<script>";
        echo "alert('Add bank list successfully');";
        echo "window.location='bank';";
        echo "</script>";
    }
}
?>