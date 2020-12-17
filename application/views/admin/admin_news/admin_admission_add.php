<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title;?></h1>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-body">

            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">ชื่อเรื่อง</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="ใส่ชื่อเรื่อง">

                </div>
                <div class="form-group">
                    <textarea name="editor1" id="editor1" rows="10" cols="80">

                </textarea>
                    <script>
                    // Replace the <textarea id="editor1"> with a CKEditor 4
                    // instance, using default configuration.
                    CKEDITOR.replace('editor1');
                    </script>
                </div>

                <button type="submit" class="btn btn-primary float-right">บันทึก</button>
            </form>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->