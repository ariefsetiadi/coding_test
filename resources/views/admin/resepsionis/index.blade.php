@extends('layouts.master')

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary" id="btnAdd">Tambah</button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="receptionistTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Modal -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="formModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" id="receptionistForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="receptionist_id" id="receptionist_id">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nama Lengkap">
                            <span class="text-danger" id="fullname_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <span class="text-danger" id="gender_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            <span class="text-danger" id="username_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                            <span class="text-danger" id="status_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="btnSave"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Reset Password Confirmation -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center my-3">
                        <img src="{{ asset('assets/img/confirm-delete.svg') }}">
                        <h5 class="my-3" style="color: #1f1f1f">Anda Yakin Ingin Reset Password Resepsionis Ini?</h5>
                        <button type="button" class="btn btn-secondary mr-1" id="btnNo" data-dismiss="modal"></button>
                        <button type="submit" class="btn btn-danger ml-1" id="btnYes"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="confirmDeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center my-3">
                        <img src="{{ asset('assets/img/confirm-delete.svg') }}">
                        <h5 class="my-3" style="color: #1f1f1f">Anda Yakin Ingin Menghapus Resepsionis Ini?</h5>
                        <button type="button" class="btn btn-secondary mr-1" id="btnTdk" data-dismiss="modal"></button>
                        <button type="submit" class="btn btn-danger ml-1" id="btnYa"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // Ajax Display Data to DataTables
            var table   =   $('#receptionistTable').DataTable({
                processing: true,
                serverSide: true,

                ajax:{
                    url: "{{ route('receptionist.index') }}",
                },

                oLanguage: {
                    sEmptyTable: 'Data Masih Kosong',
                    sZeroRecords: 'Tidak Ada Data Yang Sesuai'
                },

                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'fullname',
                        name: 'fullname'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

                columnDefs: [
                    {
                        targets: 0,
                        className: 'text-center',
                        width: '10%'
                    },
                    {
                        targets: 4,
                        className: 'text-center',
                        width: '5%'
                    },
                    {
                        targets: 5,
                        className: 'text-center',
                        width: '30%'
                    }
                ]
            });

            // Ajax Display Add Modal
            $('#btnAdd').click(function() {
                $('.modal-title').text("Tambah Resepsionis");
                $('#btnSave').text("Simpan");
                $('#receptionistForm').trigger("reset");
                $('#formModal').modal("show");
            });

            // Ajax Display Edit Modal
            $(document).on('click', '.btnEdit', function() {
                var url         =   '{{ route("receptionist.edit", ":id") }}';
                receptionist_id =   $(this).attr('id');

                $.ajax({
                    url: url.replace(":id", receptionist_id),
                    dataType: "json",
                    success: function(html) {
                        $('.modal-title').text("Edit Resepsionis");
                        $('#btnSave').text("Update");
                        $('#receptionistForm').trigger("reset");
                        $('#formModal').modal("show");
                        $('#receptionist_id').val(html.data.id);
                        $('#fullname').val(html.data.fullname);
                        $('#gender').val(html.data.gender);
                        $('#username').val(html.data.username);
                        $('#status').val(html.data.status);
                    }
                });
            });

            // Ajax Submit Receptionist
            $('#receptionistForm').on('submit', function (e) {
                e.preventDefault();

                // Ajax Save Receptionist
                if($('#btnSave').text() == 'Simpan') {
                    $('#fullname_error').html();
                    $('#gender_error').html();
                    $('#username_error').html();
                    $('#status_error').html();

                    $.ajax({
                        url: "{{ route('receptionist.store') }}",
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType:"json",

                        success: function(data) {
                            if(data.errors) {
                                if(data.errors.fullname) {
                                    $("#fullname_error").html(data.errors.fullname[0]);
                                    $("#fullname").addClass("is-invalid");
                                }
                                if(data.errors.gender) {
                                    $("#gender_error").html(data.errors.gender[0]);
                                    $("#gender").addClass("is-invalid");
                                }
                                if(data.errors.username) {
                                    $("#username_error").html(data.errors.username[0]);
                                    $("#username").addClass("is-invalid");
                                }
                                if(data.errors.status) {
                                    $("#status_error").html(data.errors.status[0]);
                                    $("#status").addClass("is-invalid");
                                }
                            }

                            if(data.success) {
                                $('#receptionistForm')[0].reset();
                                $('#formModal').modal('hide');
                                $('#receptionistTable').DataTable().ajax.reload();

                                Swal.fire({
                                    title: 'Sukses',
                                    text: data.success,
                                    icon: 'success',
                                    timer: 2000
                                });
                            }
                        }
                    });
                }

                // Ajax Update Receptionist
                if($('#btnSave').text() == 'Update') {
                    $('#fullname_error').html();
                    $('#gender_error').html();
                    $('#username_error').html();
                    $('#status_error').html();

                    $.ajax({
                        url: "{{ route('receptionist.update') }}",
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType:"json",

                        success: function(data) {
                            if(data.errors) {
                                if(data.errors.fullname) {
                                    $("#fullname_error").html(data.errors.fullname[0]);
                                    $("#fullname").addClass("is-invalid");
                                }
                                if(data.errors.gender) {
                                    $("#gender_error").html(data.errors.gender[0]);
                                    $("#gender").addClass("is-invalid");
                                }
                                if(data.errors.username) {
                                    $("#username_error").html(data.errors.username[0]);
                                    $("#username").addClass("is-invalid");
                                }
                                if(data.errors.status) {
                                    $("#status_error").html(data.errors.status[0]);
                                    $("#status").addClass("is-invalid");
                                }
                            }

                            if(data.success) {
                                $('#receptionistForm')[0].reset();
                                $('#formModal').modal('hide');
                                $('#receptionistTable').DataTable().ajax.reload();

                                Swal.fire({
                                    title: 'Sukses',
                                    text: data.success,
                                    icon: 'success',
                                    timer: 2000
                                });
                            }
                        }
                    });
                }
            });

            // Ajax Display Confirmation Reset Password Modal
            var url     =   '{{ route("receptionist.reset", ":id") }}';

            $(document).on('click', '.btnReset', function() {
                receptionist_id =   $(this).attr('id');

                $('#confirmModal').modal("show");
                $('#btnNo').text("Batal");
                $('#btnYes').text("Ya, Reset");
            });

            // Ajax Reset Password Data
            $('#btnYes').click(function() {
                $.ajax({
                    url: url.replace(":id", receptionist_id),
                    beforeSend: function() {
                        $('#btnYes').text('Reset Password...');
                    },

                    success: function(data) {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            $('#receptionistTable').DataTable().ajax.reload();
                        });

                        Swal.fire({
                            title: 'Sukses',
                            text: data.success,
                            icon: 'success',
                            timer: 2000
                        });
                    }
                });
            });

            // Ajax Display Confirmation Delete Modal
            var route   =   '{{ route("receptionist.destroy", ":id") }}';

            $(document).on('click', '.btnDelete', function() {
                recept_id =   $(this).attr('id');

                $('#confirmDeleteModal').modal("show");
                $('#btnTdk').text("Batal");
                $('#btnYa').text("Ya, Hapus");
            });

            // Ajax Delete Data
            $('#btnYa').click(function() {
                $.ajax({
                    url: route.replace(":id", recept_id),
                    beforeSend: function() {
                        $('#btnYa').text('Menghapus...');
                    },

                    success: function(data) {
                        setTimeout(function() {
                            $('#confirmDeleteModal').modal('hide');
                            $('#receptionistTable').DataTable().ajax.reload();
                        });

                        Swal.fire({
                            title: 'Sukses',
                            text: data.success,
                            icon: 'success',
                            timer: 2000
                        });
                    }
                });
            });
        });
    </script>
@endpush
