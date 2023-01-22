@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit team</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('teams.update', $team->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" placeholder="Enter name"
                                    value="{{ $team->name }}" name="name" required>
                                @if ($errors->has('name'))
                                    <small class="text-red">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Desgnation</label>
                                <input type="text" class="form-control" placeholder="Enter designation"
                                    value="{{ $team->designation }}" name="designation" required>
                                @if ($errors->has('designation'))
                                    <small class="text-red">{{ $errors->first('designation') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Descripiton</label>
                                <textarea name="description" class="form-control" id="summernote" cols="30" value="{!! $team->description !!}"
                                    rows="5">{!! $team->description !!}</textarea>
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
                                <label for="exampleInputFile">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" @if ($team->status === 'active') selected @endif>Active</option>
                                    <option value="inactive" @if ($team->status === 'inactive') selected @endif>Inactive
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
