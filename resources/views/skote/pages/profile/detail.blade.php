<div class="tab-pane fade show active" id="v-pills-detail" role="tabpanel" aria-labelledby="v-pills-detail-tab">
    <div class="row">
        <div class="col-xl-6">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">My Profile</h5>
                                <p>Personal Details</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ URL::asset('/build/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ URL::asset('/build/images/users/avatar-1.jpg') }}" alt="" class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ ucwords($employee->name) }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ app('string.helper')->changeNullWithDash(ucwords($employee->employee_position->name)) }}</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="pt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-muted mb-0">Number</p>
                                        <h5 class="font-size-15">{{ app('string.helper')->changeNullWithDash(ucwords($employee->employee_number)) }}</h5>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted mb-0">Join Date</p>
                                        <h5 class="font-size-15">{{ app('string.helper')->changeNullWithDashForDateFormatted($employee->join_date) }}</h5>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('profile.edit', ['id' => $employee->user_id]) }}" class="btn btn-primary waves-effect waves-light btn-sm">Edit Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Full Name :</th>
                                    <td>{{ ucwords($employee->name) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash($employee->phone_number) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Personal Email :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash($employee->personal_email) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Birthday :</th>
                                    <td>{{ app('string.helper')->changeNullWithDashForDateFormatted($employee->birthday) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash(ucwords($employee->gender)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Employee Information </h4> <br/>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Email :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash($employee->email) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Division :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash(ucwords($employee->employee_position->employee_division->name)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Position :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash(ucwords($employee->employee_position->name)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Level :</th>
                                    <td>{{ app('string.helper')->changeNullWithDash(ucwords($employee->employee_level->name)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Supervisor :</th>
                                    @if (count($employeeDto->employee_supervisor) > 0)
                                        <td>{{ $employeeDto->employee_supervisor['name'] }}</td>
                                    @else
                                        <td> - </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Address Information </h4> <br/>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td>{{ app('string.helper')->changeNullWithDash(null) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
