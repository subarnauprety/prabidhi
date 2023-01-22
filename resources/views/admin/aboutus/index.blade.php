@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> About US</h3>

                        <div class="card-tools">

                            <a href="{{ route('aboutus.create') }}" class="btn btn-sm btn-dark">Create About us</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="p-0 card-body table-responsive">
                        @foreach ($aboutus as $key => $about)
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
                                            <a href="{{ route('aboutus.edit', $about->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
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
