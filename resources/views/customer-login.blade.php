@extends('layout.app')
@section('section')
    <x-page-header title="Customer Zone" />
    <!-- text page-->
    <section class="padding-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="block">
                        <div class="block-header">
                            <h5>Login</h5>
                        </div>
                        <div class="block-body">
                            <p class="lead">Already our customer?</p>
                            <p class="text-muted">Welcome back! Log in to your account to access your orders, wishlist, and
                                exclusive offers. Manage your profile, track shipments, and enjoy a seamless shopping
                                experience with us.</p>
                            <p>Enter your email address and password below to continue shopping. If you don't have an
                                account yet, create one in just a few seconds and start exploring our latest collections.
                            </p>
                            <hr>
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="login_email" class="form-label">Email</label>
                                    <input id="login_email" type="email" name="email" class="form-control"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="login_password" class="form-label">Password</label>
                                    <input id="login_password" type="password" name="password" class="form-control">
                                </div>
                                @if ($errors->login->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->login->first() }}
                                    </div>
                                @endif
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-sign-in"></i> Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="block">
                        <div class="block-header">
                            <h5>New account</h5>
                        </div>
                        <div class="block-body">
                            <p class="lead">Not our registered customer yet?</p>
                            <p>Join ClothesHub today and enjoy exclusive discounts, latest fashion trends, and a seamless
                                shopping experience.</p>
                            <p class="text-muted">If you have any questions, please feel free to <a
                                    href="{{ route('contact') }}">contact us</a>, our customer service center is working for
                                you 24/7.</p>
                            <hr>
                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input id="first_name" type="text" name="first_name" class="form-control"
                                                value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input id="last_name" type="text" name="last_name" class="form-control"
                                                value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="register_email" class="form-label">Email</label>
                                            <input id="register_email" type="text" name="email" class="form-control"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input id="phone_number" type="text" name="phone_number" class="form-control"
                                                value="{{ old('phone_number') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="register_password" class="form-label">Password</label>
                                            <input id="register_password" type="password" name="password"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input id="password_confirmation" type="password" name="password_confirmation"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->register->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->register->first() }}
                                    </div>
                                @endif
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icon-profile"></i> Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection