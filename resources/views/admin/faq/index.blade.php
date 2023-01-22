@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FAQs Table</h3>

                        <div class="card-tools">

                            <a href="{{ route('faqs.create') }}" class="btn btn-sm btn-dark">Create FAQs</a>
                        </div>
                    </div>
                    <div class="p-3 card-body table-responsive">
                        @foreach ($faqs as $faq)
                            <div class="card card-success card-outline direct-chat direct-chat-success my-3">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $faq->title }}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{ $faq->id }}">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        <div class="modal fade" id="exampleModal{{ $faq->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Model
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete <span
                                                            class="text-red">{{ $faq->title }}</span> faq?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form action="{{ route('faqs.destroy', $faq->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <div class="direct-chat-messages" style="height: 100% !important">
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">{{ $faq->answer }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        @endforeach
                    </div>
                    <!-- /.card-header -->

                    <!-- /.card -->
                </div>
            </div>
        </div>
    @endsection
