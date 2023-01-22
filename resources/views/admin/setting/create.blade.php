@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Create Site Settings</h3>
                    </div>
                    <form method="POST" action="{{ route('site-setting.update', '1') }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">

                            <div class="form-group">
                                @if (isset($siteSetting->logo))
                                    <img src="{{ asset('images/' . $siteSetting->logo) }}" alt="" width="100"
                                        height="100">
                                @endif
                                <label for="exampleInputFile">Site Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="logo"
                                            value="{{ old('logo') }}">
                                    </div>
                                </div>
                                @if ($errors->has('logo'))
                                    <small class="text-red">{{ $errors->first('logo') }}</small>
                                @endif
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" placeholder="Enter email"
                                            value="{{ $siteSetting->email ?? '' }}" name="email">
                                        @if ($errors->has('email'))
                                            <small class="text-red">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="number" class="form-control" placeholder="Enter phone number"
                                            value="{{ $siteSetting->phone_number ?? '' }}" name="phone_number" required>
                                        @if ($errors->has('phone_number'))
                                            <small class="text-red">{{ $errors->first('phone_number') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" class="form-control" placeholder="Enter address"
                                            value="{{ $siteSetting->address }}" name="address" required>
                                        @if ($errors->has('address'))
                                            <small class="text-red">{{ $errors->first('address') }}</small>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="url" class="form-control" placeholder="facebook"
                                            value="{{ $siteSetting->facebook ?? '' }}" name="facebook">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Youtube</label>
                                        <input type="url" class="form-control" placeholder="Youtube"
                                            value="{{ $siteSetting->youtube ?? '' }}" name="youtube">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="url" class="form-control" placeholder="Twitter"
                                            value="{{ $siteSetting->twitter ?? '' }}" name="twitter">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Instagram</label>
                                        <input type="url" class="form-control" placeholder="Instagram"
                                            value="{{ $siteSetting->instagram ?? '' }}" name="instagram">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Linkdin</label>
                                        <input type="url" class="form-control" placeholder="Tiktok"
                                            value="{{ $siteSetting->linkdin ?? '' }}" name="linkdin">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                @if (isset($siteSetting->map))
                                    {!! $siteSetting->map !!}
                                @endif
                                <label for="exampleInputFile">Map</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="text" class="form-control" id="exampleInputFile" name="map"
                                            value="{{ $siteSetting->map ?? '' }}">
                                    </div>
                                </div>
                                @if ($errors->has('logo'))
                                    <small class="text-red">{{ $errors->first('logo') }}</small>
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
