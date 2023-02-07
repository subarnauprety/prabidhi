@extends('admin.layout.master')
@section('content')
    <div class="container">

        <div class="card card-primary mt-2">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                    value="{{ $role->name ?? '' }}" required>
                                @error('name')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Number</label>
                                <input type="number" class="form-control" placeholder="Enter Number" name="number"
                                    value="{{ $role->number ?? '' }}" required>
                                @error('number')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="address"
                                    value="{{ $role->address ?? '' }}" required>
                                @error('address')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation</label>
                                <input type="text" class="form-control" placeholder="Enter Designation"
                                    name="designation" required>
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
                                    style="height:170px;object-fit:contain;width:100%;display:none">
                                <label for="exampleInputEmail1"> Profile Picture</label>
                                <input type="file" class="form-control" onchange="loadFile9(event)"
                                    placeholder="Add profile picture" name="image" required>
                                @error('image')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                    value="{{ $role->email ?? '' }}" required>
                                @error('email')
                                    <div class="text-red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                    value="{{ $role->password ?? '' }}" required>
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
                                        <option class="form-control" value="{{ $role->id }}">{{ $role->name }}
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
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
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
