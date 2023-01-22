@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Create Blog Type</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('blogs.update',$blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PATCH')}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Type</label>
                                <select name="blog_type_id" class="form-control" required>
                                    <option value="">Select Blog Type</option>
                                    @foreach (App\Models\BlogType::latest()->get() as $type)

                                    <option value="{{$type->id}}" @if ($type->id === $blog->blog_type_id)
                                        selected
                                    @endif class="form-control">{{$type->type_title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_title'))
                                    <small class="text-red">{{ $errors->first('type_title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Title</label>
                              <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="enter title" row="20">
                                @if ($errors->has('title'))
                                    <small class="text-red">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Image</label>
                              <input type="file" name="image" value="{{old('image')}}" class="form-control" placeholder="enter image" row="20">
                                @if ($errors->has('image'))
                                    <small class="text-red">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Descripiton</label>
                                <textarea name="description" class="form-control" id="summernote" cols="30" value="{!! $blog->description !!}" rows="10">{!! $blog->description !!}</textarea>
                                @if ($errors->has('description'))
                                    <small class="text-red">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="active" @if($blog->status === "active") selected @endif >Active</option>
                                    <option value="inactive" @if($blog->status === "inactive") selected @endif >Inactive</option>
                                </select>
                            </div>

                         <div id="content-box"></div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer d-flex justify-content-between w-100 ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-success ml-auto" id="add-content">Add More Content</button>
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
<script>
    var btn = document.getElementById('add-content');
    var box = document.getElementById('content-box');
    let i = 0;
    btn.addEventListener('click',(e)=>{
        box.insertAdjacentHTML('beforeend',
            `
            <div class="form-group more-content bg-light p-2 my-2">
                            <button type="button" class="d-flex ml-auto btn btn-sm btn-danger my-2" id="removeBtn${i}">Remove</button>
                            <div class="form-group">
                                <label for="">Blog Content Title</label>
                                <input type="text" name="content_title[]" class="form-control" placeholder="write blog content title" >
                            </div>
                            <div class="form-group">
                                <label for="">Blog Content Description</label>
                                <textarea name="content[]" id="summernote${i}" class="form-control" cols="20" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Blog Content Image</label>
                               <input type="file" class="form-control" name="blog_content_image[]">
                            </div>
                    </div>
            `
        );
        $(`#summernote${i}`).summernote({
        placeholder: 'Write your blog description',
        tabsize: 2,
        height: 100
    });
        let removeBtn = document.getElementById(`removeBtn${i}`);
        removeBtn.addEventListener('click',(e)=>{
           e.target.parentElement.remove();
        })
        i++;
    });



</script>

@endsection
