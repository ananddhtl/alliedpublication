@include('frontend.include.header')
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('allied/img/slider/2.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('allied/img/slider/3.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--About Us-->
<div class="col-xxl-8 px-4 py-5 know-us">
    <div class="container">
        <div class="row align-items-end g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{asset('allied/img/kids.jpg')}}" class="d-block img-fluid" alt="About Allied Publications" loading="lazy">
            </div>
            <div class="col-lg-6 knowus-text">
                <h1 class="display-5 fw-bold lh-1">About Allied Publications</h1>
                <div class="title-bar"></div>
                <div class="about-content">
                    <p>Since 1995</p>
                    <p>Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
                        popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                        system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                    <button type="button" class="btn btn-outline-dark">Know More</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Featured-->
<div class="recent">
    <div class="featured-books pb-5 text-center">
        <div class="container px-4 pt-5" id="featured-3">
            <h1 class="display-5 fw-bold lh-1">Recent Books</h1>
            <div class="border-img">
                <img src="img/border.png" alt="">
            </div>
            <div class="row g-4 pt-3 pb-5 row-cols-1 row-cols-lg-4">
                <div class="feature col">
                    <div class="card">
                        <img class="card-img" src="{{asset('allied/img/book3.jpg')}}" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Allied Maths Pro Bundle</h5>
                            <p class="card-text"><a href="#"> More</a></p>
                        </div>
                    </div>
                </div>
                <div class="feature col">
                    <div class="card">
                        <img class="card-img" src="{{asset('allied/img/book4.jpg')}}" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Allied Maths Pro Bundle</h5>
                            <p class="card-text"><a href="#"> More</a></p>
                        </div>
                    </div>
                </div>
                <div class="feature col">
                    <div class="card">
                        <img class="card-img" src="{{asset('allied/img/book4.jpg')}}" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Allied Maths Pro Bundle</h5>
                            <p class="card-text"><a href="#"> More</a></p>
                        </div>
                    </div>
                </div>
                <div class="feature col">
                    <div class="card">
                        <img class="card-img" src="{{asset('allied/img/book4.jpg')}}" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Allied Maths Pro Bundle</h5>
                            <p class="card-text"><a href="#"> More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-outline-dark">View All</button>
        </div>
    </div>
</div>

<div class="only-featured featured-books pb-5">
    <div class="container px-4 pt-5" id="featured-3">
        <div class="d-flex justify-content-between">
            <h1 class="display-6 fw-bold lh-1">Featured Books</h1>
            <button type="button" class="btn">View All</button>
        </div>
        <div class="title-bar mb-4"></div>
        <div class="row g-4 pt-3 pb-5 row-cols-1 row-cols-lg-2">

            <div class="feature col">
                <div class="featured-box">
                    <div class="row">
                        <div class="col-6">
                            <img class="" src="{{asset('allied/img/book3.jpg')}}" alt=" image">
                        </div>
                        <div class="col-6 featured-book-content d-flex align-items-end">
                            <div>
                                <h5><b>Allied Maths Pro Bundle</b></h5>
                                <p><i>The human eye is conditioned to observe surroundings from a perspective that is
                                        generally no more...</i></p>
                                <h6><b>Author: </b> Ram Hari</h6>
                                <h6><b>Published Year: </b> 2020</h6>
                                <button type="button" class="my-2 btn btn-outline-dark">Read</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="featured-box">
                    <div class="row">
                        <div class="col-6">
                            <img class="" src="{{asset('allied/img/book3.jpg')}}" alt=" image">
                        </div>
                        <div class="col-6 featured-book-content d-flex align-items-end">
                            <div>
                                <h5><b>Allied Maths Pro Bundle</b></h5>
                                <p><i>The human eye is conditioned to observe surroundings from a perspective that is
                                        generally no more...</i></p>
                                <h6><b>Author: </b> Ram Hari</h6>
                                <h6><b>Published Year: </b> 2020</h6>
                                <button type="button" class="my-2 btn btn-outline-dark">Read</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="featured-box">
                    <div class="row">
                        <div class="col-6">
                            <img class="" src="{{asset('allied/img/book3.jpg')}}" alt=" image">
                        </div>
                        <div class="col-6 featured-book-content d-flex align-items-end">
                            <div>
                                <h5><b>Allied Maths Pro Bundle</b></h5>
                                <p><i>The human eye is conditioned to observe surroundings from a perspective that is
                                        generally no more...</i></p>
                                <h6><b>Author: </b> Ram Hari</h6>
                                <h6><b>Published Year: </b> 2020</h6>
                                <button type="button" class="my-2 btn btn-outline-dark">Read</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="featured-box">
                    <div class="row">
                        <div class="col-6">
                            <img class="" src="{{asset('allied/img/book3.jpg')}}" alt=" image">
                        </div>
                        <div class="col-6 featured-book-content d-flex align-items-end">
                            <div>
                                <h5><b>Allied Maths Pro Bundle</b></h5>
                                <p><i>The human eye is conditioned to observe surroundings from a perspective that is
                                        generally no more...</i></p>
                                <h6><b>Author: </b> Ram Hari</h6>
                                <h6><b>Published Year: </b> 2020</h6>
                                <button type="button" class="my-2 btn btn-outline-dark">Read</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Questions-->

<div class="modal-question pb-5">
    <div class="container px-4 pt-5 text-center" id="featured-3">
        <h1 class="display-6 fw-bold lh-1">Model Questions</h1>
        <div class="border-img">
            <img src="{{asset('allied/img/border.png')}}" alt="">
        </div>
        <div class="row g-4 pt-3 pb-5 row-cols-1 row-cols-lg-6 text-center">
            <div class="feature col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('allied/img/pdf1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="modal-overlay">
                            <img src="{{asset('allied/img/pdf.png')}}" width="50px" height="50px" />
                            <p class="card-text"><a href="#"> Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('allied/img/pdf1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="modal-overlay">
                            <img src="{{asset('allied/img/pdf.png')}}" width="50px" height="50px" />
                            <p class="card-text"><a href="#"> Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('allied/img/pdf1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="modal-overlay">
                            <img src="{{asset('allied/img/pdf.png')}}" width="50px" height="50px" />
                            <p class="card-text"><a href="#"> Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('allied/img/pdf1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="modal-overlay">
                            <img src="{{asset('allied/img/pdf.png')}}" width="50px" height="50px" />
                            <p class="card-text"><a href="#"> Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('allied/img/pdf1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="modal-overlay">
                            <img src="{{asset('allied/img/pdf.png')}}" width="50px" height="50px" />
                            <p class="card-text"><a href="#"> Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{asset('allied/img/pdf1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="modal-overlay">
                            <img src="{{asset('allied/img/pdf.png')}}" width="50px" height="50px" />
                            <p class="card-text"><a href="#"> Read</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-outline-dark">View All</button>
    </div>

</div>
<div class="authors">
    <div class="container px-4 pt-5" id="featured-3">
        <div class="d-flex justify-content-between">
            <h1 class="display-6 fw-bold lh-1">Authors</h1>
            <button type="button" class="btn">View All</button>
        </div>
        <div class="title-bar mb-4"></div>
        <div class="row g-4 pt-3 pb-5 row-cols-1 row-cols-lg-4 text-center">
            @foreach($author as $item)
            <div class="col">
                <div class="card">
                    <img class="card-img" src="{{$item->profile_picture}}" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="author-overlay">
                            <h3>{{$item->fullname}}</h3>
                            <p><i>{{$item->description}}</i></p>
                            <p class="card-text"><a href="#"> Know More</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>
<!--Why Us-->
<div class="why-us">
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2">Why Allied Publications?</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="card py-5">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                        <i class="bi bi-hand-thumbs-up"></i>
                    </div>
                    <h3 class="fs-5">Trusted by Authors </h3>
                </div>
            </div>
            <div class="feature col">
                <div class="card py-5">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <h3 class="fs-5">Verified Curiculam </h3>
                </div>
            </div>
            <div class="feature col">
                <div class="card py-5">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <h3 class="fs-5">Excellent Team</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Reviews-->
<div class="reviews">
    <div class="text-center mt-5">
        <h1 class="display-6 fw-bold lh-1">Reviews</h1>
        <div class="border-img">
            <img src="img/border.png" alt="">
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row g-2">
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">
                    <div class="user-image mb-4">
                        <img src="{{asset('allied/img/user1.jpg')}}" class="rounded-circle" width="80" height="80">
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Ram Sitaula</h5>
                        <span>Prof. TU, Computing Dept</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
                    </div>
                    <div class="ratings">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">
                    <div class="user-image mb-4">
                        <img src="{{asset('allied/img/user2.jpg')}}" class="rounded-circle" width="80" height="80">
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Dr. Shyam Sharma</h5>
                        <span>Curiculam Directer, CTEVT</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    </div>
                    <div class="ratings">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center px-4">
                    <div class="user-image mb-4">
                        <img src="{{asset('allied/img/user3.jpg')}}" class="rounded-circle" width="80">
                    </div>
                    <div class="user-content">
                        <h5 class="mb-0">Dr. Hari Choudary</h5>
                        <span>Secretery, Education Ministry of Nepal</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                    </div>
                    <div class="ratings">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
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