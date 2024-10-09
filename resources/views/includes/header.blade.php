<!DOCTYPE html>
<html class="no-js" lang="en_AU">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo !empty($title) ? 'Title-' . $title : 'Home'; ?></title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />

    <meta property="og:locale" content="en_AU" />
    <meta property="og:type" content="website" />
    <meta property="fb:admins" content="" />
    <meta property="fb:app_id" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="" />
    <meta property="og:image:height" content="" />
    <meta property="og:image:alt" content="" />

    <meta name="twitter:title" content="" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:image:alt" content="" />
    <meta name="twitter:card" content="summary_large_image" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/video-js.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo rand(111, 999); ?>" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap"
        rel="stylesheet">

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">

    <div class="bg-light top-header">
        <div class="container">
            <div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
                <div class="col-lg-4 logo">
                    <a href="{{ route('userindex') }}" class="text-decoration-none">
                        <span class="h2 text-uppercase text-primary bg-dark px-2">ELECTRO</span>
                        <span class="h2 text-uppercase text-dark bg-primary px-2 ml-n1">SHOP</span>
                    </a>
                </div>
                <div class="col-lg-6 col-6 text-left  d-flex justify-content-end align-items-center">
                    <a href="{{ route('useraccount') }}" class="nav-link text-dark">My Account</a>
                    <form action="">
                        <div class="input-group">
                            <input type="text" placeholder="Search For Products" class="form-control"
                                aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-xl" id="navbar">
                <a href="index.php" class="text-decoration-none mobile-logo">
                    <span class="h2 text-uppercase text-primary bg-dark">Online</span>
                    <span class="h2 text-uppercase text-white px-2">SHOP</span>
                </a>
                <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon icon-menu"></span> -->
                    <i class="navbar-toggler-icon fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" title="Products">Home</a>
        </li> -->

                        @if (getcategory()->isNotEmpty())

                            @foreach (getcategory() as $category)
                                @if ($category->status == 1)
                                    <li class="nav-item dropdown">
                                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{-- @dd($category) --}}
                                            {{ $category->name }}
                                        </button>
                                        @if ($category->subcategory->isNotEmpty())
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                @foreach ($category->subcategory as $subcategory)
                                                    <li><a class="dropdown-item nav-link"
                                                            href="{{ route('usershop') }}">{{ $subcategory->subcate_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif



                    </ul>
                </div>
                <div class="right-nav py-0">
                    {{-- @if (Auth::check()) --}}
                        <a href="{{ route('user.index') }}" class="ml-3 d-flex pt-2">
                            <i class="fas fa-shopping-cart text-primary"><span style="color: white">
                                    {{ cartCount() }}
                                </span></i>
                        </a>
                    {{-- @endif --}}
                </div>
            </nav>
        </div>
    </header>
