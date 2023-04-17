<div class="col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <h4 class="card-title mb-4">User Information</h4>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Personal Email</label>
                <div class="col-sm-9">
                    <input required name="personal_email" type="text" class="form-control" placeholder="Personal Email">
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                    <select required name="role_name" class="form-select">
                        <option value="0">Select Role</option>
                        @foreach ($roles as $key => $item)
                            <option value="{{ $key }}">{{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
