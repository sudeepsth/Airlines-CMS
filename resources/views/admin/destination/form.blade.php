<div class="card card-primary">
      <div class="card-body">
        <div class="form-group">
          <label for="destination">Destination Name</label>
          <input type="text" name="destination" value="{{old('destination',$destination->destination ?? '')}}" class="form-control @if ($errors->has('destination')) is-invalid @endif col-md-6" id="destination" placeholder="Enter destination" >

          @if ($errors->has('destination'))
            <span class="error invalid-feedback">{{ $errors->first('destination') }}</span>
            @endif
        </div>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-success">{{ $button}}</button>
      </div>
  </div>
