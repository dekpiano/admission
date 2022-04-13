<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">

    <title>ปิดปรับปรุง! ระบบรับสมัครนักเรียน</title>


    <style>
    body {
        margin: 0;
        padding: 0;
        padding: 5%;
        font-family: 'Kanit', sans-serif;
    }

    .err_page {
        width: 100%;
        height: 80%;
        margin: 4% auto;
        background: #fff;
        text-align: center;
        display: flex;
        align-items: center;
    }

    .err_page_right {
        width: 100%;
    }

    .err_page_left {
        width: 100%;
    }

    .err_page h1 {
        font-family: 'Kanit', sans-serif;
        font-size: 50pt;
        margin: 0;
        color: #6400ff;
    }

    .err_page h4 {
        color: #6400ff;
        font-size: 14pt;
    }

    .err_page p {
        font-size: 14pt;
        color: #737373;
    }

    .err_btn {
        background: #fff;
        border: 2px solid #6400ff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        font-size: 13pt;
        transition: background 0.5s;
    }

    .err_btn:hover {
        background: #6400ff;
        box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.2);
        color: #fff;
    }

    .credit {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    @media screen and (max-width: 800px) {
        .err_page {
            flex-direction: column;
        }

        .err_page_left img {
            width: 250px;
            height: auto;
        }

        .err_page h4 {
            margin: 0;
        }
    }

    /*-----------NOT NEEDED---------*/
    @media screen and (max-width: 350px) {
        .credit {
            visibility: hidden;
        }
    }
    </style>


</head>

<body>


    <div class="err_page">

        <div class="err_page_left">
            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEi_td6QYAIZlb1Bhoo7it7f1OI8XGXQIdJ51xpYTJrk-94frvU0DZwK5AJn1luY60aKIAcw9J9theq3NVi9evrs329TtdPav30jw-E1lEjsp_T1QeAITbO4R0JxphTPTL4i0774-pNIM8RtmpVGujKrFWZbVt_W-zr8DAbJ0Btsg7anUXvgmNoolkD6"
                data-toggle="modal" data-target="#LoginAdmin" width=360px height=250px />
        </div>
        <div class="err_page_right ">
            <h1>ระบบรับสมัครนักเรียน <br> ปิดปรับปรุง!</h1>
            <h4>ขณะนี้เว็บไซต์รับสมัครนักเรียนกำลังปิดปรุงเพื่อพัฒนาระบบ</h4>
            <a href="https://skj.ac.th/" class="mt-5">Back to home</a>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>








<!-- Modal-->
<div id="LoginAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Login Admin</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url('Control_login/validlogin');?>">
                    <input type="text" class="d-none" name="openyear_year" value="<?=$checkYear[0]->openyear_year;?>">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="email" name="username" id="username" placeholder="Email Address"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Signin" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>