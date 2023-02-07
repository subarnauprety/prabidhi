@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit Newsletter</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('newsletter.update', $newsletter->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" placeholder="Enter email"
                                    value="{{ $newsletter->email }}" name="email" required>
                                @if ($errors->has('email'))
                                    <small class="text-red">{{ $errors->first('email') }}</small>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" @if ($newsletter->status === 'active') selected @endif>Active</option>
                                    <option value="inactive" @if ($newsletter->status === 'inactive') selected @endif>Inactive
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
