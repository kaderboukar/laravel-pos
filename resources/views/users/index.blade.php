@extends('layouts.admin')

@section('title', 'User List')
@section('content-header', 'User List')
@section('content-actions')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
    <div class="card product-list">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->is_admin == 1)
                                    <span class="right badge badge-success">Admin</span>
                                @else
                                    <span class="right badge badge-primary">Cashire</span>
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->id != $user->id)
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger btn-delete"
                                        data-url="{{ route('users.destroy', $user) }}"><i
                                            class="fas fa-trash"></i></button>
                                @else
                                    <p><span class="right badge badge-success">You have been logged in</span> </p>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->render() }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function() {
                $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this product?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        })
                    }
                })
            })
        })
    </script>
@endsection
