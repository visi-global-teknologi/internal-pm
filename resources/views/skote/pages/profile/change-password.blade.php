<div class="tab-pane fade" id="v-pills-change-password" role="tabpanel" aria-labelledby="v-pills-payment-tab">
    <div>
        <h4 class="card-title">Password Detail</h4>
        {!! Form::open(['route' => 'api.private.users.change-password', 'method' => 'POST', 'id' => 'form-user-change-password']) !!}
            <input required type="hidden" class="form-control" name="user_id" value="{{ $employee->user->id }}">
            <div class="form-group row mb-4">
                <label class="col-md-4 col-form-label">Old Password</label>
                <div class="col-md-4">
                    <input required type="password" class="form-control" name="old_password" placeholder="Enter your old password">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-md-4 col-form-label">New Password</label>
                <div class="col-md-4">
                    <input required type="password" class="form-control" name="new_password"  placeholder="Enter your new password">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-md-4 col-form-label">Confirmation New Password</label>
                <div class="col-md-4">
                    <input required type="password" class="form-control" name="confirmation_new_password" placeholder="Enter your confirmation new password">
                </div>
            </div>
            <div class="form-group row mb-4">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
