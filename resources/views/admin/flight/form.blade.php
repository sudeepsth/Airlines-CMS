@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
<div class="card card-primary">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="destination">Airlines</label>
                    <input type="text" name="airlines" value="{{ old('airlines', $flight->airlines ?? '') }}"
                        class="form-control @if ($errors->has('airlines')) is-invalid @endif" id="airlines"
                        placeholder="Enter Airlines Name">

                    @if ($errors->has('airlines'))
                        <span class="error invalid-feedback">{{ $errors->first('airlines') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="destination">Flight Code</label>
                    <input type="text" name="flight_code"
                        value="{{ old('flight_code', $flight->flight_code ?? '') }}"
                        class="form-control @if ($errors->has('flight_code')) is-invalid @endif col-md-6"
                        id="flight_code" placeholder="Enter Flight Code">

                    @if ($errors->has('flight_code'))
                        <span class="error invalid-feedback">{{ $errors->first('flight_code') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="from">From</label>
                    <select class="form-control select2 @if ($errors->has('from')) is-invalid @endif"
                        name="from">
                        <option value="">Select From Destination </option>
                        @foreach ($destinations as $item)
                            <option value={{ $item->id }}  {{ old('from') == $item->id || ($flight->from ?? null) == $item->id ? 'selected' : '' }}>{{ $item->destination }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('from'))
                        <span class="error invalid-feedback">{{ $errors->first('from') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="to">To</label>
                    <select class="form-control select2 @if ($errors->has('to')) is-invalid @endif"
                        name="to">
                        <option value="">Select To Destination </option>
                        @foreach ($destinations as $item)
                            <option value={{ $item->id }} {{ old('to') == $item->id || ($flight->to ?? null) == $item->id ? 'selected' : '' }}>{{ $item->destination }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('to'))
                        <span class="error invalid-feedback">{{ $errors->first('to') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Flight Date and time:</label>
                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" name="flight_date" value="{{ old('flight_time', $flight_date ?? '') }}" class="form-control datetimepicker-input"
                            data-target="#reservationdatetime" />
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Flight Time">Flight Time (in Minutes)</label>
                    <input type="number" name="flight_time"
                        value="{{ old('flight_time', $flight->flight_time ?? '') }}"
                        class="form-control @if ($errors->has('flight_time')) is-invalid @endif col-md-6"
                        id="flight_time" placeholder="Enter Flight Time">

                    @if ($errors->has('flight_time'))
                        <span class="error invalid-feedback">{{ $errors->first('flight_time') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="destination">Total Seats</label>
                    <input type="text" name="total_seats" value="{{ old('total_seats', $flight->total_seats ?? '') }}"
                        class="form-control @if ($errors->has('total_seats')) is-invalid @endif col-md-6"
                        id="total_seats" placeholder="Enter total available seats">

                    @if ($errors->has('total_seats'))
                        <span class="error invalid-feedback">{{ $errors->first('total_seats') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-success">{{ $button }}</button>
    </div>
</div>
