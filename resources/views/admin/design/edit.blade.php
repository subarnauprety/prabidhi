@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Testimonials</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('choice.update', $testimonial->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('admin.design.form')
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
