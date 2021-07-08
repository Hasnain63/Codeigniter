<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>My_blog!</title>
</head>

<body>
    <div class="container">
        <div class="row>">
            <div class="col-md-4 offset-md-4 pt-10" style="padding-top: 13%;">
                <form action="<?php echo base_url() . 'index.php/login/index'; ?>" method="POST">
                    <?php if ($this->session->flashdata()) { ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                    <?php } ?>
                    <h3>Please sign in here</h3>
                    <div>
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div>
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pass" value="<?php echo set_value('pass'); ?>" class="form-control"
                            id="exampleInputPassword1">
                        <?php echo form_error('pass'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-primary" href="<?php echo base_url() . 'index.php/signup/index/'; ?>"> signUp</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>