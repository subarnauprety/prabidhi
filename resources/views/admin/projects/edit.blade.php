@extends('admin.layout.master')
@section('content')
    <div class=" content mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create project</h3>
                    </div>
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" placeholder="Enter title"
                                    value="{{ $project->title }}" name="title">
                                @if ($errors->has('title'))
                                    <small class="text-red">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select name="project_type_id" class="form-control" id="" required>
                                        @foreach (App\Models\ProjectType::latest()->get() as $type)
                                            <option value="{{ $type->id }}"
                                                @if ($project->project_type_id == $type->id) selected @endif>{{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('project_type_id'))
                                        <small class="text-red">{{ $errors->first('type') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea name="description" class="form-control" cols="25" rows="10" value="{{ $project->description }}">{{ $project->description }}</textarea>
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
                                        <option value="active" @if ($project->status === 'active') selected @endif>Active
                                        </option>
                                        <option value="inactive" @if ($project->status === 'inactive') selected @endif>Inactive
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
