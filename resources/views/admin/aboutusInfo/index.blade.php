@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title"> About US info</h3>

                        <div class="card-tools">

                            <a href="{{ route('about-info.create') }}" class="btn btn-sm btn-info">Create About Info</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body table-responsive">
                        @foreach ($aboutInfo as $key => $about)
                            <div class="container my-3 p-3" style="border:1px solid black">
                                <div class="row">
                                    <div class="col-md-10">
                                        {{ $key + 1 }}. {{ $about->title }}
                                        <img src="{{ asset('images/' . $about->image) }}" alt="" class="my-2"
                                            style="width: 100%;height:300px;object-fit:cover">
                                        <div class="mt-2">
                                            {!! $about->description !!}
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-end">
                                        <div>
                                            <a href="{{ route('about-info.edit', $about->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal{{ $about->id }}"
                                                class="btn btn-sm btn-danger">
                                                Delete
                                            </a>
                                            <div class="modal fade" id="exampleModal{{ $about->id }}" tabindex="-1"
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
                                                                class="text-red">{{ $about->title }}</span> about
                                                            info?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="{{ route('about-info.destroy', $about->id) }}"
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
