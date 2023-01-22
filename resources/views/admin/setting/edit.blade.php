@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Site Settings</h3>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('site-setting.update', '1') }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Site Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="logo">
                                    </div>
                                </div>
                                @if ($errors->has('logo'))
                                    <small class="text-red">{{ $errors->first('logo') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" placeholder="Enter email"
                                    value="{{ $siteSetting->email }}" name="email" required>
                                @if ($errors->has('email'))
                                    <small class="text-red">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="number" class="form-control" placeholder="Enter phone number"
                                    value="{{ $siteSetting->phone_number }}" name="phone_number" required>
                                @if ($errors->has('phone_number'))
                                    <small class="text-red">{{ $errors->first('phone_number') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" placeholder="Enter address"
                                    value="{{ $siteSetting->address }}" name="address" required>
                                @if ($errors->has('address'))
                                    <small class="text-red">{{ $errors->first('address') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input type="text" class="form-control" placeholder="facebook"
                                    value="{{ $siteSetting->facebook }}" name="facebook">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Youtube</label>
                                <input type="text" class="form-control" placeholder="Youtube"
                                    value="{{ $siteSetting->youtube }}" name="youtube">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input type="url" class="form-control" placeholder="Twitter"
                                    value="{{ $siteSetting->twitter }}" name="twitter">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input type="url" class="form-control" placeholder="Instagram"
                                    value="{{ $siteSetting->instagram }}" name="instagram">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiktok</label>
                                <input type="url" class="form-control" placeholder="Tiktok"
                                    value="{{ $siteSetting->tiktok }}" name="Tiktok">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" @if ($siteSetting->status === 'active') selected @endif>Active</option>
                                    <option value="inactive" @if ($siteSetting->status === 'inactive') selected @endif>Inactive
                                    </option>
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
