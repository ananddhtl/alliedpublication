@include('frontend.include.header')
<div class="inner-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Get in Touch</p>
    </div>
</div>
<!--Contact Details-->
<div class="contacts py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <div class="contact-details">
                    <h2 class="my-4">Allied Publications Pvt. Ltd</h2>
                    <ul class="contacts">
                        <li class=" mb-3"><i class="bi bi-house"></i><a href="#" class=" p-0">Kathmandu Nepal</a></li>
                        <li class=" mb-3"><i class="bi bi-telephone"></i><a href="#" class=" p-0">01 000000</a></li>
                        <li class=" mb-3"><i class="bi bi-telephone"></i><a href="#" class=" p-0">980000000</a></li>
                        <li class=" mb-3"><i class="bi bi-envelope"></i><a href="#" class=" p-0">email@email.com</a>
                        </li>
                        </li>
                        <li class=" mb-3"><i class="bi bi-globe"></i><a href="#" class=" p-0">www.aaaaa.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 contact-form text-end">
                <h2 class="mb-4">Get In Touch</h2>
                <form action="{{ url('/addContactForm') }}"  method="POST">
                    @csrf
                    <div class="container-fluid mb-4">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        rows="1"> Your Message</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Map-->
<div class="map">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14132.248937181947!2d85.32540587326943!3d27.684471326109808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bfd910ffe9%3A0x66f431dda92f7629!2sShankhamul%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1679983641728!5m2!1sen!2snp"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
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