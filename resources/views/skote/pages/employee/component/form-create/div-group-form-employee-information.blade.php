<div class="col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <h4 class="card-title mb-4">Employee Information</h4>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Employee Number</label>
                <div class="col-sm-9">
                    <input required name="employee_number" type="text" class="form-control" placeholder="Employee Number">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input required name="email" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Join Date</label>
                <div class="col-sm-9" id="datepickerJoinDate">
                    <input required name="join_date" type="text" class="form-control"
                        data-date-format="yyyy-mm-dd" data-date-container='#datepickerJoinDate'
                        data-provide="datepicker" data-date-autoclose="true"
                        >
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Division</label>
                <div class="col-sm-9">
                    <select required id="selectEmployeeDivision" class="form-select">
                        <option value="0">Select Division</option>
                        @foreach ($employeeDivisions as $key => $item)
                            <option value="{{ $key }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Position</label>
                <div class="col-sm-9">
                    <select required id="selectEmployeePosition" class="form-select" name="employee_position_id"></select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Level</label>
                <div class="col-sm-9">
                    <select required name="employee_level_id" class="form-select">
                        <option value="0">Select Level</option>
                        @foreach ($employeeLevels as $key => $item)
                            <option value="{{ $key }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Supervisor</label>
                <div class="col-sm-9">
                    <select required name="employee_supervisor_id" class="form-select">
                        <option value="0">Select Supervisor</option>
                        @foreach ($users as $key => $item)
                            <option value="{{ $key }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
