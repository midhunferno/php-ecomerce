@extends('customer.main')

@section('content')
    <div class="account-page">
        <div class="container">
            <div class="row">

                <div class="col-2">
                    <img src="{{ asset('assets/img/hero-img-1.png') }}" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container " style="height: 450px">

                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>

                        @if (session('registration_success'))
                            <script>
                                window.onload = function() {
                                    login();
                                    alert('Registration successful! Please log in.');
                                }
                            </script>
                        @endif
                        <form id="LoginForm" action="{{ route('customers.login') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="btnn">Login</button>
                            <a href="">Forget Password</a>
                        </form>

                        <form id="RegForm" action="{{ route('customers.register') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Username">
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="phone" placeholder="Phone number">
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="password_confirmation" placeholder="Re-enter-password">
                            <button type="submit" class="btnn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px"
                } else {
                    MenuItems.style.maxHeight = "0px"
                }
            }
        </script>
        <script>
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicator = document.getElementById("Indicator");

            function register() {
                RegForm.style.transform = "translate(0px)";
                LoginForm.style.transform = "translatex(0px)";
                Indicator.style.transform = "translateX(100px)";

            }

            function login() {

                RegForm.style.transform = "translatex(300px)";
                LoginForm.style.transform = "translatex(300px)";
                Indicator.style.transform = "translate(0px)";
            }
            @if (session('registration_success'))
                login();
            @endif
        </script>
    @endpush
@endsection
