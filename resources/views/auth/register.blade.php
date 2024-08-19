<x-app-layout>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow" wire:navigate>Home</a>                    
                    <span></span> Register
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">                        
                            <div class="col-lg-6">
                               <img src="{{ asset('assets/imgs/login.png') }}">
                            </div>
                            <div class="col-lg-6">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Create an Account</h3>
                                        </div>                                        
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" required autocomplete="new-password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="register">Submit &amp; Register</button>
                                            </div>
                                        </form>                                        
                                        <div class="text-muted text-center">Already have an account? <a href="{{ route('login') }}">Sign in now</a></div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>