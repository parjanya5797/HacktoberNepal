@extends('website.layouts.app',['include_menu'=>false,'include_footer'=>false])

@section('content')
<section class="position-relative pb-0">
    <div class="gen-register-page-background" style="background-image: url('images/background/asset-3.jpeg');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <div id="pms_register-form" class="pms-form">
                        <form action="{{route('register.store')}}" method="POST">
                            @csrf
                            <h4>Register</h4>
                            <ul class="pms-form-fields-wrapper pl-0" style="list-style-type: none">
                                <li class="pms-field pms-user-login-field ">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" placeholder="Your Name">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </li>
                                <li class="pms-field pms-user-email-field ">
                                    <label for="email">E-mail *</label>
                                    <input id="email" name="email" type="email" placeholder="abc@xyz.com">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </li>
                                <li class="pms-field pms-pass1-field">
                                    <label for="password">Password *</label>
                                    <input id="password" name="password" type="password" placeholder="***********">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </li>
                            </ul>

                            <input type="submit" value="Register" class="mt-5">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection