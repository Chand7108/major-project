<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name">@lang('app.role')</label>
            {!! Form::select('role_id', $roles, $edit ? $user->role->id : '',
                ['class' => 'form-control', 'id' => 'role_id', $profile ? 'disabled' : '']) !!}
        </div>
        <!-- <div class="form-group">
            <label for="status">@lang('app.status')</label>
            {!! Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control', 'id' => 'status', $profile ? 'disabled' : '']) !!}
        </div> -->

        <div class="form-group">
            <label for="aadhar_number">@lang('app.aadhar')</label>
            <input type="text" class="form-control" id="aadhar_number"
                   name="aadhar_number" placeholder="@lang('app.aadhar')" value="{{ $edit ? $user->aadhar_number : '' }}">
        </div>
        <div class="form-group">
            <label for="first_name">@lang('app.first_name')</label>
            <input type="text" class="form-control" id="first_name"
                   name="first_name" placeholder="@lang('app.first_name')" value="{{ $edit ? $user->first_name : '' }}">
        </div>
        <div class="form-group">
            <label for="last_name">@lang('app.last_name')</label>
            <input type="text" class="form-control" id="last_name"
                   name="last_name" placeholder="@lang('app.last_name')" value="{{ $edit ? $user->last_name : '' }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="voterid">@lang('app.voterid')</label>
            <div class="form-group">
                <input type="text"
                       name="voterid"
                       id='voterid'
                       value="{{ $edit && $user->voterid ? $user->present()->voterid : '' }}"
                       class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="phone">@lang('app.phone')</label>
            <input type="text" class="form-control" id="phone"
                   name="phone" placeholder="@lang('app.phone')" value="{{ $edit ? $user->phone : '' }}">
        </div>



        <div class="form-group">
           <label for="state">@lang('app.state')</label>
            <!--  <input type="text"  placeholder="@lang('app.state')" value="{{ $edit ? $user->state : '' }}"> -->
            <select class="form-control" id="state" name="state" >
                                          <option value="0">MadhyaPradesh</option> 
                                          <option value="3">Maharashtra</option>
                                          <option value="6">Krnataka</option>
                                          <option value="9">UttarPradesh</option>
                                          <option value="12">Punjab</option>
                                          <option value="15">Rajsthan</option>
                                          <option value="18">Kerala</option>
                                          <option value="21">Gujarat</option>
                                          <option value="24">TamilNadu</option>
                                          <option value="27">JammuKashmir</option>
            </select>
        </div>





        <div class="form-group">
            <label for="address">@lang('app.country')</label>
            {!! Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control']) !!}
        </div>
    </div>

    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                @lang('app.update_details')
            </button>
        </div>
    @endif
</div>
