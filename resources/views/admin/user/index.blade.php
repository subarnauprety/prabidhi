@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Table</h3>

                        <div class="card-tools">

                            <a href="{{ route('register') }}" class="btn btn-sm btn-dark">Create User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body table-responsive">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->email }}</td>

                                        {{-- <td>
                                            <a href="{{ route('users.edit', $user->id) }}">
                                                <i class="ri-edit-box-line text-primary mx-1"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                                                <i class="ri-delete-bin-2-line text-danger"></i>
                                            </a>
                                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Model
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to delete <span
                                                                class="text-red">{{ $user->name }}</span>
                                                            user?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit"
                                                                    class="btn btn-primary">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
