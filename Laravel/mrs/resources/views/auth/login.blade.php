@extends('website.layouts.app',['include_menu'=>false,'include_footer'=>false])

@section('content')
<section class="position-relative pb-0">
    <div class="gen-login-page-background" style="background-image: url('images/background/asset-54.jpg');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <form action="{{route('login.store')}}" method="post" id="pms_login">
                        @csrf
                        <h4>Sign In</h4>
                        <p class="login-username">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="input" value="" size="20">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </p>
                        <p class="login-password">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="input" value="" size="20">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </p>
                        <p class="login-submit">
                            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                value="Log In">
                        </p>
                        <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect"><a
                            href="{{route('register.index')}}">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection