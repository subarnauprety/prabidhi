@extends('admin.layout.master')
@section('content')
    <div class="container">

        <div class="card card-primary mt-2">
            <div class="card-header">
                <h3 class="card-title">Update User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Name</label>
                                <input type="text" class="form-control" placeholder="Enter user name" name="name"
                                    value="{{ $user->name ?? '' }}" required>
                                @error('name')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Number</label>
                                <input type="number" class="form-control" placeholder="Enter number" name="number"
                                    value="{{ $user->number ?? '' }}" required>
                                @error('number')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="address"
                                    value="{{ $user->address ?? '' }}" required>
                                @error('address')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation</label>
                                <input type="text" class="form-control" placeholder="Enter Designation"
                                    name="designation" value="{{ $user->designation ?? '' }}" required>
                                @error('designation')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img class="w-100" id="output00" alt=""
                                    src="{{ asset('profile/' . $user->image) }}"
                                    style="height:170px;object-fit:contain;width:100%;">
                                <label for="exampleInputEmail1"> Profile Picture</label>
                                <input type="file" class="form-control" onchange="loadFile9(event)"
                                    placeholder="Add profile picture" name="image">
                                @error('image')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                    value="{{ $user->email ?? '' }}" required>
                                @error('email')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                    value="">
                                @error('password')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1"> Role</label>
                                <select name="role_id" id="" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach (App\Models\Role::latest()->get() as $role)
                                        <option class="form-control" @if ($user->role->id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('role')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Status</label>
                                <select name="status" id="" class="form-control" required>

                                    <option value="active" @if ($user->status === 'active') selected @endif>Active</option>
                                    <option value="inactive" @if ($user->status === 'inactive') selected @endif>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var loadFile9 = function(event) {
            let image77 = document.getElementById('output00');
            image77.src = URL.createObjectURL(event.target.files[0]);
            image77.style.display = "block"
        };
    </script>
@endsection
