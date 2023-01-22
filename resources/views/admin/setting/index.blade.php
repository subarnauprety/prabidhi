@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Site Setting Table</h3>

                        <div class="card-tools">
                            {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="float-right form-control" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div> --}}
                            <a href="{{ route('site-setting.create') }}" class="btn btn-sm btn-dark">Create Site
                                Settings</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body table-responsive">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{ $setting->id }}</td>
                                        <td>{{ $setting->email }}</td>
                                        <td><img src="{{ asset('images/' . $setting->logo) }}" width="90"></td>
                                        <td>{{ $setting->phone_number }}</td>
                                        <td>
                                            @if ($setting->status === 'active')
                                                <span class="badge badge-success">active</span>
                                            @else
                                                <span class="badge badge-danger">inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('site-setting.edit', $setting->id) }}">
                                                <i class="ri-edit-box-line text-primary mx-1"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{ $setting->id }}">
                                                <i class="ri-delete-bin-2-line text-danger"></i>
                                            </a>
                                            <div class="modal fade" id="exampleModal{{ $setting->id }}" tabindex="-1"
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
                                                                class="text-red">{{ $setting->title }}</span>
                                                            setting?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form
                                                                action="{{ route('site-setting.destroy', $setting->id) }}"
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
                                        </td>
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
