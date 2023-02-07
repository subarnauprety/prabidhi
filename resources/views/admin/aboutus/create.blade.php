@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <p class="card-title">Create About US</p>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('aboutus.store') }}" enctype="multipart/form-data">
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
                                <label for="exampleInputPassword1">Short Description</label>
                                <textarea name="short_description" class="form-control" cols="5" rows="5"
                                    value="{{ old('short_description') }}">{{ old('short_description') }}</textarea>
                                @if ($errors->has('short_description'))
                                    <small class="text-red">{{ $errors->first('short_description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="description" class="form-control" cols="10" rows="5" id="summernot"
                                    value="{{ old('description') }}">{{ old('description') }}</textarea>
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
                            {{-- <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Members</label>
                                <input type="integer" class="form-control" placeholder="Enter Members"
                                    value="{{ old('members') }}" name="members" required>
                                @if ($errors->has('members'))
                                    <small class="text-red">{{ $errors->first('members') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Projects</label>
                                <input type="integer" class="form-control" placeholder="Enter projects"
                                    value="{{ old('projects') }}" name="projects" required>
                                @if ($errors->has('projects'))
                                    <small class="text-red">{{ $errors->first('projects') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Happy Clients</label>
                                <input type="integer" class="form-control" placeholder="Enter clients"
                                    value="{{ old('clients') }}" name="clients" required>
                                @if ($errors->has('clients'))
                                    <small class="text-red">{{ $errors->first('clients') }}</small>
                                @endif
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
@section('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Write your blog description',
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
