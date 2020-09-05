@extends('auth_layout.auth_template')

@section('register')

<div class="container" id="container">
    <h1>Test Changes ankit new</h1>
    <div class="form-container sign-in-container">
        <form action="/api/company" method="post" autocomplete="off" id="register_form">
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
                    <input type="text" autocomplete="off" class="required" placeholder="Company Name" name="company_name" />
                    <input type="text" autocomplete="off" placeholder="Tagline" name="tagline" />
                    <input type="website" autocomplete="off" placeholder="Website" name="website_url" class="url" />
                    <input type="email" autocomplete="off" class="required" placeholder="Email Id" name="company_email" />
                    <input type="text" autocomplete="off" class="required" placeholder="Founder" name="founder_name" />
                    <input type="email" autocomplete="off" class="required" placeholder="Founder Email Id" name="founder_email" />

                    <button form-next-step="1" type="submit" class="my-3 float-right next-btn step-1-next-btn">Next</button>
                </div>
            {{-- End Step 1 Code --}}


             {{-- Start Step 2 Code --}}
             <div class="step-2 d-none">
                <input type="text" autocomplete="off" class="required" placeholder="Contact Number" name="contact_number" />
                <input type="text" autocomplete="off" class="required" placeholder="Street Address" name="street_address" />
                <input type="text" autocomplete="off" class="required" placeholder="City" name="city" />
                <input type="text" autocomplete="off" class="required" placeholder="State" name="state" />
                <input type="text" autocomplete="off" class="required" placeholder="Counry" name="country" />
                <input type="number" autocomplete="off" class="required" placeholder="Pincode" name="pin_code" />
                <div class="d-flex justify-content-between w-100">
                    <button form-back-step="2" class="back-btn my-3 float-left step-2-back-btn back-btn" id="signIn">Back</button>
                    <button form-next-step="2"  class="my-3 float-right next-btn step-2-next-btn">Next</button>
                </div>
            </div>
            {{-- End Step 2 Code --}}


            {{-- Start Step 3 Code --}}
            <div class="step-3 d-none">
                <input type="text" autocomplete="off" placeholder="Gstin" name="gstin" />
                <input type="time" autocomplete="off" class="required" name="office_open_at" />
                <input type="time" autocomplete="off" class="required" name="office_close_at" />
                <input type="date" autocomplete="off" class="required" name="establish_in" />
                <input type="url" autocomplete="off" placeholder="Facebook Url" name="facebook_url" class="url" />
                <input type="url" autocomplete="off" placeholder="Twitter Url" name="twitter_url" class="url" />

                <button form-back-step="3" class="back-btn my-3 float-left step-3-back-btn back-btn" id="signIn">Back</button>
                <button form-next-step="3" class="my-3 float-right next-btn step-3-next-btn">Next</button>
            </div>
             {{-- End Step 3 Code --}}

            {{-- Start Step 4 Code --}}
            <div class="step-4 d-none">
                <input type="number" autocomplete="off" placeholder="What's App Number" name="whatsApp_number" />
                <select name="category" class="required" id="">
                    <option selected desabled value="category">Category</option>
                    <option value="Educations">Educations</option>
                </select>

                <input type="text" name="erp_url" value="testing_static_erp_url" class="">

                <button form-back-step="4" class="back-btn my-3 float-left step-4-back-btn back-btn" id="signIn">Back</button>
                <button  type="submit" class="my-3 float-right submit-btn">Submit</button>
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
            <div class="overlay-panel overlay-right">
                <h1>Welcome Back!</h1>
                {{-- <p>To keep connected with us please login with your personal info</p> --}}
                <a class="ghost btn" id="signIn" href="{{url('login')}}">Sign In</a>
            </div>
        </div>
    </div>
</div>

@endsection
