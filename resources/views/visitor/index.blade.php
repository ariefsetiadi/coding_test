<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{ $title }}</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

        <style>
            .nav-link {
                font-size: 32px;
            }
        </style>
    </head>

    <body class="bg-primary">
        <div class="container py-5">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills nav-fill justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="check-in-tab" data-toggle="pill" href="#check-in" role="tab" aria-controls="check-in" aria-selected="true">CHECK-IN</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="check-out-tab" data-toggle="pill" href="#check-out" role="tab" aria-controls="check-out" aria-selected="false">CHECK-OUT</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="check-in" role="tabpanel" aria-labelledby="check-in-tab">
                            <form method="post" id="checkInForm" class="form-horizontal" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanda Pengenal</label>
                                            <select name="id_card" id="id_card" class="form-control">
                                                <option value="">-- Pilih Tanda Pengenal --</option>
                                                <option value="KTP">KTP</option>
                                                <option value="SIM">SIM</option>
                                            </select>
                                            <span class="text-danger" id="id_card_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nomor Tanda Pengenal</label>
                                            <input type="text" name="id_number" id="id_number" class="form-control" placeholder="Nomor Tanda Pengenal">
                                            <span class="text-danger" id="id_number_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nama Lengkap">
                                            <span class="text-danger" id="fullname_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <span class="text-danger" id="gender_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Tanggal Lahir">
                                            <span class="text-danger" id="date_of_birth_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                            <span class="text-danger" id="email_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telepon">
                                            <span class="text-danger" id="phone_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            <span class="text-danger" id="image_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alamat Lengkap</label>
                                            <textarea name="address" id="address" class="form-control" rows="5" placeholder="Alamat Lengkap"></textarea>
                                            <span class="text-danger" id="address_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <hr>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bertemu Dengan</label>
                                            <input type="text" name="meet_with" id="meet_with" class="form-control" placeholder="Bertemu Dengan">
                                            <span class="text-danger" id="meet_with_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Perihal</label>
                                            <textarea name="concern" id="concern" class="form-control" rows="5" placeholder="Perihal"></textarea>
                                            <span class="text-danger" id="concern_error"></span>
                                        </div>
                                    </div>
                                </div>
    
                                <hr>
    
                                <button type="submit" class="btn btn-lg btn-success float-right" id="btnCheckIn">Check-In</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="check-out" role="tabpanel" aria-labelledby="check-out-tab">
                            <div class="row">
                                <div class="col-md-11">
                                    <input type="text" name="id_number" id="id_number" class="form-control" placeholder="Nomor Tanda Pengenal">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                // Ajax Check In Store
                $('#checkInForm').on('submit', function (e) {
                    e.preventDefault();

                    $('#id_card_error').html();
                    $('#id_number_error').html();
                    $('#fullname_error').html();
                    $('#gender_error').html();
                    $('#date_of_birth_error').html();
                    $('#email_error').html();
                    $('#phone_error').html();
                    $('#image_error').html();
                    $('#address_error').html();
                    $('#meet_with_error').html();
                    $('#concern_error').html();

                    $.ajax({
                        url: "{{ route('visitor.postCheckIn') }}",
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType:"json",

                        success: function(data) {
                            if(data.errors) {
                                if(data.errors.id_card) {
                                    $("#id_card_error").html(data.errors.id_card[0]);
                                    $("#id_card").addClass("is-invalid");
                                }
                                if(data.errors.id_number) {
                                    $("#id_number_error").html(data.errors.id_number[0]);
                                    $("#id_number").addClass("is-invalid");
                                }
                                if(data.errors.fullname) {
                                    $("#fullname_error").html(data.errors.fullname[0]);
                                    $("#fullname").addClass("is-invalid");
                                }
                                if(data.errors.gender) {
                                    $("#gender_error").html(data.errors.gender[0]);
                                    $("#gender").addClass("is-invalid");
                                }
                                if(data.errors.date_of_birth) {
                                    $("#date_of_birth_error").html(data.errors.date_of_birth[0]);
                                    $("#date_of_birth").addClass("is-invalid");
                                }
                                if(data.errors.email) {
                                    $("#email_error").html(data.errors.email[0]);
                                    $("#email").addClass("is-invalid");
                                }
                                if(data.errors.phone) {
                                    $("#phone_error").html(data.errors.phone[0]);
                                    $("#phone").addClass("is-invalid");
                                }
                                if(data.errors.image) {
                                    $("#image_error").html(data.errors.image[0]);
                                    $("#image").addClass("is-invalid");
                                }
                                if(data.errors.address) {
                                    $("#address_error").html(data.errors.address[0]);
                                    $("#address").addClass("is-invalid");
                                }
                                if(data.errors.meet_with) {
                                    $("#meet_with_error").html(data.errors.meet_with[0]);
                                    $("#meet_with").addClass("is-invalid");
                                }
                                if(data.errors.concern) {
                                    $("#concern_error").html(data.errors.concern[0]);
                                    $("#concern").addClass("is-invalid");
                                }
                            }

                            if(data.success) {
                                $('#checkInForm')[0].reset();

                                Swal.fire({
                                    title: 'Sukses',
                                    text: data.success,
                                    icon: 'success',
                                    timer: 2000
                                }).then(function() {
                                    window.location.href = "{{ route('index') }}";
                                });
                            }
                        }
                    });
                });
            })
        </script>
    </body>
</html>