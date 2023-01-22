   <div class="card-body">
       <div class="form-group">
           <label for="exampleInputEmail1">Name</label>
           <input type="text" class="form-control" placeholder="Enter name"
               value="{{ $testimonial->name ?? old('name') }}" name="name" required>
           @if ($errors->has('name'))
               <small class="text-red">{{ $errors->first('name') }}</small>
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
               <option value="active">Active</option>
               <option value="inactive">Inactive</option>
           </select>
       </div>
   </div>
