<head>

    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user_assets/css/video-js.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item">Login</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            <div class="login-form">
                <form action="/api/login" method="post" id="LoginForm">
                    @csrf
                    <h4 class="modal-title">Login to Your Account</h4>
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                            required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password" required="required">
                    </div>
                    <div class="form-group small">
                        <a href="#" class="forgot-link">Forgot Password?</a>
                    </div>
                    {{-- <input type="submit" name="login" id="login" class="btn btn-dark btn-block btn-lg" value="Login">     --}}
                    <button type="submit" name="login" id="login" class="btn btn-dark btn-block btn-lg"
                        value="Login">Login</button>
                </form>
                <div class="text-center small">Don't have an account? <a href="">Sign up</a></div>
            </div>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        $('#LoginForm').on('submit', function(e) {
            e.preventDefault();
            const email = $('#email').val();
            const password = $('#password').val();
            var url = $(this).attr("action");

            $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    email: email,
                    password: password,
                }),
                success: function(response) {
                    console.log(response);
                    localStorage.setItem('api_token', response.token);
                    window.location.href = "/products";
                },
                error: function(xhr, status, error) {
                    alert('Error:' + xhr.responseText);
                }

            })
        })
    });
</script>
