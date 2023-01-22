@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-8 p-2">
                        <p class="my-1">Blog Type: {{ $blog->blogType->type_title }}</p>
                        <p class="my-1">Blog title: {{ $blog->title }}</p>
                        <p class="my-1">Blog Description: {!! $blog->description !!}</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('images/' . $blog->image) }}" alt=""
                            style="height: 200px;width:100%;object-fit:cover;margin-left:auto">
                    </div>
                </div>
            </div>

            <div class="contents my-4">
                {{-- {{$blog->blogContents}} --}}
                @foreach ($blog->blogContents as $content)
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="row ">
                                <div class="col-md-9">
                                    {{ $content->content_title }}
                                </div>
                                <div class="col-md-3 d-flex justify-content-end">
                                    <a href="{{ route('blog-content.edit', $content->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#exampleModal{{ $content->id }}">
                                        Delete
                                    </a>
                                    <div class="modal fade" id="exampleModal{{ $content->id }}" tabindex="-1"
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
                                                        class="text-red">{{ $content->content_title }}</span>
                                                    blog?
                                                </div>
                                                <div class="modal-footer">
                                                    <button blog="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form action="{{ route('blog-content.destroy', $content->id) }}"
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
                                </div>
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-between">
                            {!! $content->content !!}
                            <img src="{{ asset('images/' . $content->blog_content_image) }}" alt="" class="ml-auto"
                                width="200px">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
