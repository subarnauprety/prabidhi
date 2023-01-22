@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Blog Content</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('blog-content.update', $blogContent->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" placeholder="Enter content_title"
                                    value="{{ $blogContent->content_title }}" name="content_title">
                                @if ($errors->has('content_title'))
                                    <small class="text-red">{{ $errors->first('content_title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="content" class="form-control" cols="25" rows="10" id="summernote"
                                    value="{!! $blogContent->content !!}">{!! $blogContent->content !!}</textarea>
                                @if ($errors->has('content'))
                                    <small class="text-red">{{ $errors->first('content') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="blog_content_image"
                                            value="{{ old('blog_content_image') }}">
                                    </div>
                                </div>
                                @if ($errors->has('blog_content_image'))
                                    <small class="text-red">{{ $errors->first('blog_content_image') }}</small>
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
