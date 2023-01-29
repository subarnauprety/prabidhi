@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3 px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Services Table</h3>
                    </div>
                    <div class="p-3 card-body table-responsive">
                        @foreach ($services as $service)
                            <div class="card card-success card-outline direct-chat direct-chat-success my-3">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $service->name }}, {{ $service->email }},
                                        {{ $service->number }}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <div class="direct-chat-messages" style="height: 100% !important">
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span>Service: {{ $service->Service }}</span>
                                                <span class="direct-chat-name float-left">{{ $service->message }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
