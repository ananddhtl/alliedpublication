@include('frontend.include.header')
<div class="inner-hero">
    <div class="container">
        <h1>Dashboard</h1>
        <p> Your Profile</p>
    </div>
</div>

<!--About Content-->
<div class="container dashboard">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="row">
                    <div class="col-md-7">
                        <div class="">
                            <h5 class="mt-1">{{ $publicUsersDetails->name }}</h5>
                            <div class="school mb-3">
                                <p class="mb-0"><i> Student</i></p>
                                <p class="mb-0 college"><b> {{ $publicUsersDetails->user_school }}</b></p>
                            </div>
                            <div class="details">
                                <p class="mb-1"><i class="bi bi-telephone"></i>{{ $publicUsersDetails->mobile_number }}
                                </p>
                                <p class="mb-1"><i class="bi bi-envelope"></i>{{ $publicUsersDetails->email }}</p>
                                <p class="mb-1"><i class="bi bi-geo-alt"></i>Chetrapati</p>
                                <p class="mb-1"><i class="bi bi-map"></i>Kathmandu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="border-left dates">
                            <p class="mb-2"><b>Join Date:</b> 30th may 2022</p>
                            <p class="mb-2"><b>Expiry Date:</b> 1st june 2023</p>
                        </div>
                        @if($publicUsersDetails->status == 1)
                        <div class="status text-center mt-5">
                            <i class="bi bi-person-check"></i>
                            <p>Active</p>
                        </div>
                        @else
                        <div style="color:red;"class="status text-center mt-5">
                            <i style="color:red;"class="bi bi-person-fill-x"></i>
                            <p>In Active</p>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Membership-->
<div class="membership">
    <div class="container">
        <div class="row">
            <div class="col-6 py-5">
                <h3>Are you looking for membership ?</h3>
            </div>
            <div class="col-6 py-5 contact-btn">
                <button type="button" class="btn btn-outline-secondary">Contact Us</button>
            </div>
        </div>
    </div>
</div>

@include('frontend.include.footer')