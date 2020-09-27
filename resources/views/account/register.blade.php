@extends('auth_layout.auth_template')

@section('register')

<div class="container" id="container">
    <h1>Test Changes ankit new</h1>
    <div class="form-container sign-in-container">

        <form  action="/api/company" method="post" autocomplete="off" enctype="multipart/form-data" id="register_form">
            @csrf
            <h1 class="my-2">Create Account</h1>
            {{-- <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
            </div> --}}
            <span>Fill Your Details For Registration</span>

            {{-- Start Step 1 Code --}}
                <div class="step-1 needs-validation">
                    <input type="text" autocomplete="off" class="required cmp-name" maxlength="80" placeholder="Company Name" name="company_name" />
                    <input type="url" name="erp_url"  class="erp-url d-none">
                    <input type="password" name="password"  class="password d-none">
                    <input type="file" accept="image/*" name="cmp_logo">

                    <input type="text" autocomplete="off" placeholder="Tagline" name="tagline"maxlength="100" />
                    <input type="website" autocomplete="off" placeholder="Website" name="website_url" maxlength="100" class="url" />
                    <input type="email" autocomplete="off" class="required" placeholder="Email Id" name="company_email" maxlength="80" />
                    <input type="text" autocomplete="off" class="required" placeholder="Founder" name="founder_name" maxlength="80" />
                    <input type="email" autocomplete="off" class="required" placeholder="Founder Email Id" name="founder_email" maxlength="80" />

                    <button form-next-step="1" type="submit" class="my-3 float-right next-btn step-1-next-btn">Next</button>
                </div>
             {{-- End Step 1 Code --}}

             {{-- Start Step 2 Code --}}
             <div class="step-2 d-none">
                <input type="text" autocomplete="off" class="required" placeholder="Contact Number" name="contact_number" maxlength="13" />
                <input type="text" autocomplete="off" class="required" placeholder="Street Address" name="street_address" maxlength="80" />
                <input type="text" autocomplete="off" class="required" placeholder="City" name="city" maxlength="45" />
                <input type="text" autocomplete="off" class="required" placeholder="State" name="state" maxlength="45" />
                <input type="text" autocomplete="off" class="required" placeholder="Counry" name="country" maxlength="45" />
                <input type="number" autocomplete="off" class="required" placeholder="Pincode" name="pin_code" />
                <div class="d-flex justify-content-between w-100">
                    <button form-back-step="2" class="back-btn my-3 float-left step-2-back-btn back-btn" >Back</button>
                    <button form-next-step="2"  class="my-3 float-right next-btn step-2-next-btn">Next</button>
                </div>
            </div>
            {{-- End Step 2 Code --}}

            {{-- Start Step 3 Code --}}
            <div class="step-3 d-none">
                <input type="text" autocomplete="off" placeholder="Gstin" name="gstin" maxlength="95"/>
                <input type="time" autocomplete="off" class="required" name="office_open_at" />
                <input type="time" autocomplete="off" class="required" name="office_close_at" />
                <input type="date" autocomplete="off" class="required" name="establish_in" />
                <input type="url" autocomplete="off" placeholder="Facebook Url" name="facebook_url" class="url" maxlength="95" />
                <input type="url" autocomplete="off" placeholder="Twitter Url" name="twitter_url" class="url" maxlength="95" />

                <button form-back-step="3" class="back-btn my-3 float-left step-3-back-btn back-btn" >Back</button>
                <button form-next-step="3" class="my-3 float-right next-btn step-3-next-btn">Next</button>
            </div>
             {{-- End Step 3 Code --}}

            {{-- Start Step 4 Code --}}
            <div class="step-4 d-none">
                <input type="number" autocomplete="off" placeholder="What's App Number" name="whatsApp_number" maxlength="13" />
                <select name="category" class="required" id="">
                    <option selected desabled value="category">Category</option>
                    <option value="Educations">Educations</option>
                </select>

                <button form-back-step="4" class="back-btn my-3 float-left step-4-back-btn back-btn" >Back</button>
                <button  type="submit" name='' class="my-3 float-right submit-btn">Submit</button>
            </div>
            {{-- End Step 4 Code --}}

        </form>

        {{-- <div class="strip">
            <div class="alert alert-danger empty-field d-none" role="alert">
                Please Fill The Empty Field Frist
              </div>
        </div> --}}

    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right" style="height: 50vh; margin-top: 250px;">
                {{-- <h1>Welcome Back!</h1>
                <a class="ghost btn" id="signIn" href="{{url('login')}}">Sign In</a> --}}

                    <form  method="post" action="/dumy" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="uploded_file" id="">

                        <input type="submit" value="summit">
                    </form>

            </div>
        </div>
    </div>
</div>

@endsection
