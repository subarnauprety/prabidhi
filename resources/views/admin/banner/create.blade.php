@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Banner</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title"
                                    value="{{ old('title') }}" name="title" required>
                                @if ($errors->has('title'))
                                    <small class="text-red">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="description" class="form-control" cols="10" rows="10" value="{{ old('description') }}">{{ old('title') }}</textarea>
                                @if ($errors->has('description'))
                                    <small class="text-red">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="image"
                                            value="{{ old('image') }}">
                                    </div>
                                </div>
                                @if ($errors->has('image'))
                                    <small class="text-red">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link 1</label>
                                <input type="url" class="form-control" placeholder="Enter link1"
                                    value="{{ old('link1') }}" name="link1" required>
                                @if ($errors->has('link1'))
                                    <small class="text-red">{{ $errors->first('link1') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link 2</label>
                                <input type="url" class="form-control" placeholder="Enter link2"
                                    value="{{ old('link2') }}" name="link2" required>
                                @if ($errors->has('link2'))
                                    <small class="text-red">{{ $errors->first('link2') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
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
