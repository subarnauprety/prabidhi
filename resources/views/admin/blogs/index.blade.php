@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blogs Table</h3>

                        <div class="card-tools">
                            {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                <input blog="text" name="table_search" class="float-right form-control" placeholder="Search">

                                <div class="input-group-append">
                                    <button blog="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div> --}}
                            <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-dark">Create Blog
                                </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body table-responsive">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>

                                    <th>blog</th>
                                    <th>Status</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td><img src="{{asset('images/'.$blog->image)}}" width="80" ></td>

                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            @if ($blog->status === 'active')
                                                <span class="badge badge-success">active</span>
                                            @else
                                                <span class="badge badge-danger">inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('blogs.show', $blog->id) }}">
                                                <i class="ri-eye-line"></i>                                            </a>
                                            <a href="{{ route('blogs.edit', $blog->id) }}">
                                                <i class="ri-edit-box-line text-primary mx-1"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{ $blog->id }}">
                                                <i class="ri-delete-bin-2-line text-danger"></i>
                                            </a>
                                            <div class="modal fade" id="exampleModal{{ $blog->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Model
                                                            </h5>
                                                            <button blog="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to delete <span
                                                                class="text-red">{{ $blog->title }}</span>
                                                            blog?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button blog="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button blog="submit"
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
