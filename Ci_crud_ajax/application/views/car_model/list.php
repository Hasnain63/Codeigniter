<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <header>
        <div class="container pt-4 pb-4 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#"><strong>Ajax_Crud</strong> </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                </div>
                </nav>


            </div>
        </div>

        </div>

    </header>



    <div class="container ml-4 pl-4 ">
        <a class="btn btn-primary" href="javasript:void(0); " onclick="showModel();">Create</a>
    </div>




    <div class="container">

        <table class="table table-striped" id="carModellist">
            <tbody>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Transmition</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>

                <?php foreach ($rows as $row) {
                    $data['row'] = $row;
                    $this->load->view('car_model/car_row', $data);
                } ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="createCar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="response">
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="ajaxResponceModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

    <script type="text/javascript">
    function showModel() {
        $('#createCar').modal('show')

        $.ajax({
            url: '<?php echo base_url() . 'Car_model/showCreateForm' ?>',
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(response) {
                $('#response').html(response['html']);
            }

        })
        $("body").on('submit', '#createCarModel', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url() . 'Car_model/save_model' ?>',
                type: 'POST',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    // $('#response').html(response['html']);
                    if (response['status'] == 0) {
                        if (response['name'] != "") {
                            $('.nameError').html(response['name']).addClass(
                                'invalid-feedback d-block');
                            $('#name').addClass('is-invalid');
                        } else {
                            $('.nameError').html('').removeClass(
                                'invalid-feedback d-block');
                            $('#name').removeClass('is-invalid');
                        }

                        if (response['color'] != "") {
                            $('.colorError').html(response['color']).addClass(
                                'invalid-feedback d-block');
                            $('#color').addClass('is-invalid');
                        } else {
                            $('.colorError').html('').removeClass(
                                'invalid-feedback d-block');
                            $('#color').removeClass('is-invalid');
                        }
                        if (response['price'] != "") {
                            $('.priceError').html(response['price']).addClass(
                                'invalid-feedback d-block');
                            $('#price').addClass('is-invalid');
                        } else {
                            $('.priceError').html('').removeClass(
                                'invalid-feedback d-block');
                            $('#price').removeClass('is-invalid');
                        }
                    } else {


                        $('#createCar').modal('hide');
                        $("#ajaxResponceModel .modal-body").html(response["msg"]);
                        $('#ajaxResponceModel').modal('show');




                        $('.nameError').html('').removeClass(
                            'invalid-feedback d-block');

                        $('#name').removeClass('is-invalid');
                        $('.colorError').html('').removeClass(
                            'invalid-feedback d-block');

                        $('#color').removeClass('is-invalid');
                        $('.priceError').html('').removeClass(
                            'invalid-feedback d-block');
                        $('#price').removeClass('is-invalid');



                        $('#carModellist').append(response["row"]);



                    }
                }

            })
        });
    }

    function showEditForm(id) {

        $('#createCar .modal-title').html('Edit');
        $.ajax({
            url: '<?php echo base_url() . 'Car_model/getCar_model/' ?>' + id,
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                $('#createCar #response').html(response['html']);
                $('#createCar').modal('show');
            }
        });
    }
    $("body").on('submit', '#EditCarModel', function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url() . 'Car_model/updateModel' ?>',
            type: 'POST',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {
                // $('#response').html(response['html']);
                if (response['status'] == 0) {
                    if (response['name'] != "") {
                        $('.nameError').html(response['name']).addClass(
                            'invalid-feedback d-block');
                        $('#name').addClass('is-invalid');
                    } else {
                        $('.nameError').html('').removeClass(
                            'invalid-feedback d-block');
                        $('#name').removeClass('is-invalid');
                    }

                    if (response['color'] != "") {
                        $('.colorError').html(response['color']).addClass(
                            'invalid-feedback d-block');
                        $('#color').addClass('is-invalid');
                    } else {
                        $('.colorError').html('').removeClass(
                            'invalid-feedback d-block');
                        $('#color').removeClass('is-invalid');
                    }
                    if (response['price'] != "") {
                        $('.priceError').html(response['price']).addClass(
                            'invalid-feedback d-block');
                        $('#price').addClass('is-invalid');
                    } else {
                        $('.priceError').html('').removeClass(
                            'invalid-feedback d-block');
                        $('#price').removeClass('is-invalid');
                    }
                } else {

                    $('#createCar').modal('hide');
                    $("#ajaxResponceModel .modal-body").html(response["msg"]);
                    $('#ajaxResponceModel').modal('show');




                    $('.nameError').html('').removeClass(
                        'invalid-feedback d-block');

                    $('#name').removeClass('is-invalid');
                    $('.colorError').html('').removeClass(
                        'invalid-feedback d-block');

                    $('#color').removeClass('is-invalid');
                    $('.priceError').html('').removeClass(
                        'invalid-feedback d-block');
                    $('#price').removeClass('is-invalid');

                }
            }

        });
    });
    </script>
</body>

</html>