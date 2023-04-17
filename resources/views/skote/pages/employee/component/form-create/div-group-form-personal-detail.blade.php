<div class="col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <h4 class="card-title mb-4">Personal Detail</h4>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-9">
                    <input required name="name" type="text" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-9">
                    <input required name="phone_number" type="text" class="form-control" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Birthday</label>
                <div class="col-sm-9" id="datepickerBirthday">
                    <input required name="birthday" type="text" class="form-control"
                        data-date-format="yyyy-mm-dd" data-date-container='#datepickerBirthday'
                        data-provide="datepicker" data-date-autoclose="true"
                        >
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <select required name="gender" class="form-select">
                        @foreach (['male', 'female'] as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
