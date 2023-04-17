<div class="col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <h4 class="card-title mb-4">Address Information</h4>
            <div class="row mb-4">
                <label class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="radioCountry" value="indonesia" checked>
                        <label class="form-check-label">
                            Indonesia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioCountry" value="other">
                        <label class="form-check-label">
                            Other
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <div id="indonesia_address" class="row mb-4">
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Province</label>
                        <div class="col-sm-9">
                            <select id="selectTwoIndonesiaProvince" name="province_code" class="form-control select2"></select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                            <select id="selectTwoIndonesiaCity" name="city_code" class="form-control select2"></select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">District</label>
                        <div class="col-sm-9">
                            <select id="selectTwoIndonesiaDistrict" name="district_code" class="form-control select2"></select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Village</label>
                        <div class="col-sm-9">
                            <select id="selectTwoIndonesiaVillage" name="village_code" class="form-control select2"></select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Postal Code</label>
                        <div class="col-sm-9">
                            <input name="indonesia_postal_code" type="text" class="form-control" placeholder="Postal Code">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea id="textareaIndonesiaAddress" name="indonesia_address" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div id="other_address" style="display: none">
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                        <select id="selectTwoOtherCountry" name="country_id" class="form-control select2"></select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">Postal Code</label>
                    <div class="col-sm-9">
                        <input name="other_postal_code" type="text" class="form-control" placeholder="Postal Code">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <textarea id="textareaOtherAddress" name="other_address" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
