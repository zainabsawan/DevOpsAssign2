@extends('Layouts.mainLayout')
@section('title', 'Signup')
@section('css')
    href={{ URL::asset('css/heroes.css')}}
@endsection
@section('navbar')
@endsection
@section('maincontent')

    <main class="container">
    <!--==================================================MAIN-->
    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">🌿 Join our plant-loving community
                    </h1>
                    <p class="col-lg-10 fs-4">Gain access to a stunning array of nature's wonders but also unlock a world of benefits. From improved air quality to reduced stress, our plants bring a touch of tranquility to your space. Let's grow together! 🌱 Sign up now and let the positive vibes begin.</p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                  <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                   
                    <form action="signup" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput"
                            placeholder="Name">
                        <label for="floatingInput">Name</label>
                    </div>
                      <div class="form-floating mb-3">
                          <input type="email" name="email" class="form-control" id="floatingInput"
                              placeholder="name@example.com">
                          <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating mb-3">
                          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                          <label for="floatingPassword">Password</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="telphone" name="phone" class="form-control" id="floatingInput"
                            placeholder="01302388494">
                        <label for="floatingInput">Telephone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="address" class="form-control" id="floatingInput"
                            placeholder="Residential Address">
                        <label for="floatingInput">Address</label>
                    </div>
                      
                      {{-- <div class="checkbox mb-3">
                          <label>
                              <input type="checkbox" value="remember-me"> Remember me
                          </label>
                      </div> --}}
                      
                      <hr class="my-4">
                      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                      
                      <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
                  </form>
                  </div>
                    
                </div>
            </div>
        </div>
    </main>

@endsection
