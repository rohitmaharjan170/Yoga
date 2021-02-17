<div class="form-group">
    <label class="control-label">Name</label>
    <div>
        <input type="name" class="form-control input-lg " name="name" id="name" required autocomplete ="name" >
        <span class="text-danger">{{ $errors->first('name') }}</span> 
    </div>
</div>
<div class="form-group">
    <label class="control-label">Image</label>
    <div>
        <input type="file" class="form-control input-lg" name="image" id="image"  autocomplete ="image">
        <span class="text-danger">{{ $errors->first('image') }}</span> 
                                 
    </div>
</div>
<div class="form-group">
    <label class="control-label">Designation</label>
    <div>
        <input type="text" class="form-control input-lg" name="designation" id="designation" required autocomplete = "designation">
        <span class="text-danger">{{ $errors->first('designation') }}</span> 
    </div>
</div>
<div class="form-group">
    <label class="control-label">Description</label>
    <div>
    <textarea class="form-control input-lg" name="description" id="description" required autocomplete = "description"></textarea>
    <span class="text-danger">{{ $errors->first('description') }}</span> 
    </div>
</div>
                            
