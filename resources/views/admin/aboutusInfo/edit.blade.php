@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit About us</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('about-info.update', $aboutInfo->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title"
                                    value="{{ $aboutInfo->title }}" name="title">
                                @if ($errors->has('title'))
                                    <small class="text-red">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="description" class="form-control" cols="25" rows="10" id="summernote"
                                    value="{{ $aboutInfo->description }}">{{ $aboutInfo->description }}</textarea>
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
                                    <option value="active" @if ($aboutInfo->status === 'active') selected @endif>Active
                                    </option>
                                    <option value="inactive" @if ($aboutInfo->status === 'inactive') selected @endif>Inactive
                                    </option>
                                </select>
                            </div> --}}
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
