@extends('admin.template')
@section('content')
<div class="main-content">
    <div class="container-fluid d-flex justify-content-between mb-3 py-3">
        <h3>Data Users</h3>
        <header class="justify-content-end">
            <button type="button" id="btnAdd" class="btn btn-primary">Tambah User</button>
        </header>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered" id="tabel_user">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
 <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="userForm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="userId" name="userId">
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group mb-3">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#tabel_user').DataTable({
            ajax: {
                url: "{{ route('list-users') }}",
                dataSrc: "data",
                method: "GET",
                headers: {
                    'Authorization': 'Bearer ' + API_TOKEN
                }
            },
            columns: [
                { data: null, render: function (data, type, row, meta) {
                    return meta.row + 1;
                }},
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'address' },
                { data: 'role' },
                { data: null, render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-warning btn-edit" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">Delete</button>
                    `;
                }}
            ],
            initComplete: function(settings, json) {
                if(json.message)
                    toastr.success(json.message);
                
            },
            error: function(xhr, status, error) {
                toastr.error('Gagal memuat data users: ' + error);
            },
        });
         $('#btnAdd').click(function() {
            $('#userForm')[0].reset();
            $('#userId').val('');
            $('#userModalLabel').text('Tambah User');
            $('#userModal').modal('show');
        });

        $('#userForm').submit(function(e) {
            e.preventDefault();
            const userId = $('#userId').val();
            const url = userId ? `/api/users/${userId}` : '/api/users';
            const method = userId ? 'PUT' : 'POST';
            
            // Siapkan data dalam format JSON
            let formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
                role: $('#role').val()
            };
            
            // Handle password: hanya kirim jika diisi atau untuk user baru
            const password = $('#password').val();
            if (password || !userId) {
                formData.password = password;
            }
            
            console.log('Sending data:', formData); // Debug: lihat data yang dikirim
            
            $.ajax({
                url: url,
                method: method,
                data: JSON.stringify(formData), // Kirim sebagai JSON
                contentType: 'application/json', // Set content type ke JSON
                headers: {
                    'Authorization': 'Bearer ' + API_TOKEN
                },
                success: function(response) {
                    $('#userModal').modal('hide');
                    $('#tabel_user').DataTable().ajax.reload();
                    toastr.success(response.message);
                    $('#userForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Tampilkan detail error validasi
                    if (xhr.status === 422 && xhr.responseJSON) {
                        let errorMsg = 'Validation Error:\n';
                        if (xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(field, errors) {
                                errorMsg += `${field}: ${errors.join(', ')}\n`;
                            });
                        } else if (xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        toastr.error(errorMsg);
                        console.log('Validation errors:', xhr.responseJSON);
                    } else {
                        toastr.error('Gagal menyimpan data user: ' + error);
                    }
                }
            });
        });

        $('#tabel_user').on('click', '.btn-edit', function() {
            const userId = $(this).data('id');
            $.ajax({
                url: `/api/users/${userId}`,
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + API_TOKEN
                },
                success: function(response) {
                    $('#userId').val(response.data.id);
                    $('#name').val(response.data.name);
                    $('#email').val(response.data.email);
                    $('#phone').val(response.data.phone);
                    $('#address').val(response.data.address);
                    $('#role').val(response.data.role);
                    $('#userModalLabel').text('Edit User');
                    $('#userModal').modal('show');
                },
                error: function(xhr, status, error) {
                    toastr.error('Gagal memuat data user: ' + error);
                }
            });
        });

        $('#tabel_user').on('click', '.btn-delete', function() {
            const userId = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: `/api/users/${userId}`,
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + API_TOKEN
                    },
                    success: function(response) {
                        $('#tabel_user').DataTable().ajax.reload();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Gagal menghapus data user: ' + error);
                    }
                });
            }
        });
    });
</script>
@endsection