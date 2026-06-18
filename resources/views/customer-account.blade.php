@extends('layout.app')
@section('section')
  <x-page-header title="Your Profile" />
  <x-customer-sidebar />

  <!-- Content -->
  <div class="col-lg-8 col-xl-9 pl-lg-3">
    <!-- Change Password -->
    <div class="block-header mb-5">
      <h5>Change password</h5>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
    @endif
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <form class="content-block" method="POST" action="{{ route('changePassword') }}">
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password_old" class="form-label">Old password</label>
            <input id="password_old" name="old_password" type="password" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="password_1" class="form-label">New password</label>
            <input id="password_1" name="new_password" type="password" class="form-control">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="password_2" class="form-label">Retype new password</label>
            <input id="password_2" name="new_password_confirmation" type="password" class="form-control">
          </div>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-save"></i> Change password
        </button>
      </div>
    </form>

    <!-- Personal Details -->
    <div class="block-header mb-5">
      <h5>Personal details</h5>
    </div>
    <form class="content-block" method="POST" action="{{ route('customerProfile.update') }}">
      @csrf

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="firstname" class="form-label">Firstname</label>
            <input id="firstname" name="first_name" type="text" class="form-control"
              value="{{ old('first_name', $user->first_name) }}">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="lastname" class="form-label">Lastname</label>
            <input id="lastname" name="last_name" type="text" class="form-control"
              value="{{ old('last_name', $user->last_name) }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="street" class="form-label">Street</label>
            <input id="street" name="street" type="text" class="form-control" value="{{ old('street', $user->street) }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="form-group">
            <label for="city" class="form-label">City</label>
            <input id="city" name="city" type="text" class="form-control" value="{{ old('city', $user->city) }}">
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="form-group">
            <label for="zip" class="form-label">Postal Code</label>
            <input id="zip" name="postal_code" type="text" class="form-control"
              value="{{ old('postal_code', $user->postal_code) }}">
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="form-group">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-control" style="width: 250px; height: 40px; padding: 10px;">
              <option value="">Select State</option>
              @php
                $states = [
                  "Andhra Pradesh",
                  "Arunachal Pradesh",
                  "Assam",
                  "Bihar",
                  "Chhattisgarh",
                  "Goa",
                  "Gujarat",
                  "Haryana",
                  "Himachal Pradesh",
                  "Jharkhand",
                  "Karnataka",
                  "Kerala",
                  "Madhya Pradesh",
                  "Maharashtra",
                  "Manipur",
                  "Meghalaya",
                  "Mizoram",
                  "Nagaland",
                  "Odisha",
                  "Punjab",
                  "Rajasthan",
                  "Sikkim",
                  "Tamil Nadu",
                  "Telangana",
                  "Tripura",
                  "Uttar Pradesh",
                  "Uttarakhand",
                  "West Bengal"
                ];
              @endphp
              @foreach ($states as $state)
                <option value="{{ $state }}" {{ old('state', $user->state ?? '') == $state ? 'selected' : '' }}>
                  {{ $state }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input id="phoneNumber" name="phone_number" type="text" class="form-control"
              value="{{ old('phone_number', $user->phone_number) }}">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" class="form-control" value="{{ old('email', $user->email) }}">
          </div>
        </div>

        <div class="col-sm-12 text-center">
          <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save changes </button>
        </div>
      </div>
    </form>

  </div>
  </div>
  </div>
  </section>

@endsection