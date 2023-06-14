<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Allied Publications | Nepals no.1 Publication</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="{{asset('allied/css/style.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<style>
/* profile menu */

.profile {
    position: relative;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    text-align: end;
}

.profile i {
    color: white;
    font-size: 20px;
}

.profile h3 {
    text-align: end;
    line-height: 1;
    font-weight: 60px;
    font-size: 17px;
    margin-top: 12px;
    color: white;
}


.menu {
    position: absolute;
    top: calc(100% + 24px);
    right: 16px;
    width: 200px;
    min-height: 100px;
    background: #fff;
    box-shadow: 0 10px 20px rgba(0, 0, 0, .2);
    opacity: 0;
    transform: translateY(-10px);
    visibility: hidden;
    transition: 300ms;
}

.menu::before {
    content: '';
    position: absolute;
    top: -10px;
    right: 14px;
    width: 20px;
    height: 20px;
    background: #fff;
    transform: rotate(45deg);
    z-index: -1;
}

.menu.active {
    opacity: 1;
    transform: translateY(0);
    visibility: visible;

}

/* menu links */

.menu ul {
    position: relative;
    display: flex;
    flex-direction: column;
    z-index: 10;
    background: #fff;
}

.profile .img-box {
    position: relative;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    overflow: hidden;
}

.profile .img-box img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}


.menu ul li {
    list-style: none;
}

.menu ul li:hover {
    background: #eee;
}

.menu ul li a {
    text-decoration: none;
    color: #000;
    display: flex;
    align-items: center;
    padding: 15px 20px;
    gap: 6px;
}

.menu ul li a i {
    font-size: 1.2em;
}
</style>
<?php
$id = null;
if (session()->get('sessionUserPassword') != "") {
    $user = \DB::table('public_users')
        ->select('*')
        ->where('password', session()->get('sessionUserPassword'))
        ->get();
    if (!empty($user) && isset($user[0])) {
        $id = $user[0]->id;
    }
}

?>

<body>
    <!--Header-->
    <div id="topNav" class="top-header fixed-top initial-menu-padding">
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center">
                <a href="#" class="brand d-flex align-items-center me-md-auto text-decoration-none">
                    <img src="{{asset('allied/img/logo-white.png')}}" />
                </a>
                <ul class="nav">
                    <li class="nav-item"><a href="/" class="nav-link"><i class="bi bi-house"></i><span>Home</span></a>
                    </li>
                    <li class="nav-item"><a href="/aboutus" class="nav-link active" aria-current="page"><i
                                class="bi bi-building"></i><span>About Us</span></a></li>
                    <li class="nav-item"><a href="/services" class="nav-link"><i
                                class="bi bi-gear-wide-connected"></i><span>Services</span></a></li>
                    <li class="nav-item"><a href="/books" class="nav-link"><i
                                class="bi bi-book"></i><span>Books</span></a></li>
                    <li class="nav-item"><a href="/contactus" class="nav-link"><i
                                class="bi bi-geo-alt"></i><span>Contact Us</span></a></li>
                </ul>
                @if(session()->get('sessionUserPassword') != "")
                <div class="profile">
                    <i class="bi bi-person-circle"></i>
                    <div class="user">

                        <h3>{{@$user[0]->name}}</h3>
                    </div>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="/userdashboard"><i class="ph-bold ph-user"></i>&nbsp;Dashboard</a></li>
                        <li><a href="/logout-user"><i class="ph-bold ph-envelope-simple"></i>&nbsp;Logout</a></li>
                    </ul>
                </div>
                @else
                <a href="/login"><button type="button" class="btn btn-outline-secondary">Login</button></a><a
                    href="/register"><button type="button" class="btn btn-outline-secondary">Register</button></a>
                @endif
            </header>
        </div>
    </div>
    <script>
    let profile = document.querySelector('.profile');
    let menu = document.querySelector('.menu');

    profile.onclick = function() {
        menu.classList.toggle('active');
    }
    </script>