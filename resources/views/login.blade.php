<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login Page</title>
    <link rel="icon" href="/image/logo1.png">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="/image/kimwhite1.png" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('t4t5-sweetalert-419427d/docs-src/assets/css/index.styl') }}">

    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway");

        :root {
            --glow-color: hsl(186 100% 69%);
            --disable-color: hsl(1, 0%, 52%);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            user-select: none;
            height: 100%;
            max-width: 100%;
            overflow-y: hidden;
            background: linear-gradient(#141e30, #243b55);
        }

        .bubbles {
            position: relative;
            display: flex;
        }

        .bubbles span {
            position: relative;
            width: 30px;
            height: 30px;
            background: #4fc3dc;
            margin: 0 4px;
            border-radius: 50%;
            box-shadow: 0 0 0 10px #4fc3dc44, 0 0 50px #4fc3dc, 0 0 100px #4fc3dc;
            animation: anime 15s linear infinite;
            animation-duration: calc(120s / var(--i));
        }

        .bubbles span:nth-child(even) {
            background: #ff2d75;
            box-shadow: 0 0 0 10px #ff2d7544, 0 0 50px #ff2d75, 0 0 100px #ff2d75;
        }

        @keyframes anime {
            0% {
                transform: translateY(100vh) scale(0);
            }

            100% {
                transform: translateY(-10vh) scale(1);
            }
        }

        body.my-login-page {
            background-color: #d1d3d6;
            font-size: 14px;
        }

        .my-login-page .card-wrapper {
            width: 400px;
        }

        .my-login-page .card {
            border-color: transparent;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.9);
            box-shadow: 0 15px 25px rgba(0, 0, 0, .06);
            overflow: hidden;
            z-index: 111;
        }

        /* .box {
                border-color: transparent;
                border-radius: 10px;
                background: rgba(0, 0, 0, 0.5);
                box-shadow: 0 15px 25px rgba(0, 0, 0, .06);
                overflow: hidden;
            }

            .box::before {
                content: '';
                position: absolute;
                left: 20%;
                width: 200px;
                height: 300px;
                background: linear-gradient(0deg, transparent, #03e9f4, #03e9f4);
                transform-origin: bottom right;
                animation: animate 6s linear infinite;
            }

            .box::after {
                content: '';
                position: absolute;
                top: -10%;
                left: 40%;
                width: 200px;
                height: 300px;
                background: linear-gradient(0deg, transparent, #03e9f4, #03e9f4);
                transform-origin: bottom right;
                animation: animate 6s linear infinite;
                animation-delay: -3s;
            }

            @keyframes animate {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            } */



        .my-login-page .card.fat {
            padding: 10px;
        }

        .my-login-page .card .card-title {
            margin-bottom: 30px;
        }

        .my-login-page .form-control {
            border-width: 2.3px;
        }

        .my-login-page .form-group label {
            width: 100%;
        }

        .my-login-page .btn.btn-block {
            padding: 12px 10px;
        }

        .my-login-page .footer {
            margin: 40px 0;
            color: #888;
            text-align: center;
        }

        /* .button-login {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: 0.5s;
            margin-top: 40px;
            letter-spacing: 4px;
            background-color: transparent;
            border: transparent;
            overflow: hidden;
            justify-items: center;
            justify-content: center;
            border: 2px solid #03e9f4;
            border-radius: 10px;
        }

        .button-login:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 100px #03e9f4;
        }

        @media screen and (max-width: 760px) {
            .my-login-page .card-wrapper {
                width: 90%;
                margin: 0 auto;
            }

            .my-login-page .brand {
                width: 90px;
                height: 90px;
                overflow: hidden;
                border-radius: 50%;
                margin: 40px auto;
                box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
                position: relative;
                z-index: 1;
                margin-top: 10px;
                margin-bottom: 10px;
            }
        }

        @media screen and (max-width: 320px) {
            .my-login-page .card.fat {
                padding: 0;
            }

            .my-login-page .card.fat .card-body {
                padding: 15px;
            }
        } */

        .glowing-btn {
            position: relative;
            color: var(--glow-color);
            cursor: pointer;
            padding: 0.35em 1em;
            border: 0.15em solid var(--glow-color);
            border-radius: 0.45em;
            background: none;
            perspective: 2em;
            font-family: "Raleway", sans-serif;
            font-size: 1.5em;
            font-weight: 900;
            letter-spacing: 1em;

            -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
                0px 0px 0.5em 0px var(--glow-color);
            -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
                0px 0px 0.5em 0px var(--glow-color);
            box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
                0px 0px 0.5em 0px var(--glow-color);
            animation: border-flicker 2s linear infinite;
        }

        .glowing-txt {
            float: left;
            margin-right: -0.8em;
            -webkit-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3),
                0 0 0.45em var(--glow-color);
            -moz-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3),
                0 0 0.45em var(--glow-color);
            text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em var(--glow-color);
            animation: text-flicker 3s linear infinite;
        }

        .faulty-letter {
            opacity: 0.5;
            animation: faulty-flicker 2s linear infinite;
        }

        .glowing-btn::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.7;
            filter: blur(1em);
            transform: translateY(120%) rotateX(95deg) scale(1, 0.35);
            background: var(--glow-color);
            pointer-events: none;
        }

        .glowing-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            z-index: -1;
            background-color: var(--glow-color);
            box-shadow: 0 0 2em 0.2em var(--glow-color);
            transition: opacity 100ms linear;
        }

        .glowing-btn:hover {
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            animation: none;
        }

        .glowing-btn:hover .glowing-txt {
            animation: none;
        }

        .glowing-btn:hover .faulty-letter {
            animation: none;
            text-shadow: none;
            opacity: 1;
        }

        .glowing-btn:hover:before {
            filter: blur(1.5em);
            opacity: 1;
        }

        .glowing-btn:hover:after {
            opacity: 1;
        }

        @keyframes faulty-flicker {
            0% {
                opacity: 0.1;
            }

            2% {
                opacity: 0.1;
            }

            4% {
                opacity: 0.5;
            }

            19% {
                opacity: 0.5;
            }

            21% {
                opacity: 0.1;
            }

            23% {
                opacity: 1;
            }

            80% {
                opacity: 0.5;
            }

            83% {
                opacity: 0.4;
            }

            87% {
                opacity: 1;
            }
        }

        @keyframes text-flicker {
            0% {
                opacity: 0.1;
            }

            2% {
                opacity: 1;
            }

            8% {
                opacity: 0.1;
            }

            9% {
                opacity: 1;
            }

            12% {
                opacity: 0.1;
            }

            20% {
                opacity: 1;
            }

            25% {
                opacity: 0.3;
            }

            30% {
                opacity: 1;
            }

            70% {
                opacity: 0.7;
            }

            72% {
                opacity: 0.2;
            }

            77% {
                opacity: 0.9;
            }

            100% {
                opacity: 0.9;
            }
        }

        @keyframes border-flicker {
            0% {
                opacity: 0.1;
            }

            2% {
                opacity: 1;
            }

            4% {
                opacity: 0.1;
            }

            8% {
                opacity: 1;
            }

            70% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;
            }
        }

        @media only screen and (max-width: 600px) {
            .glowing-btn {
                font-size: 1em;
            }
        }

        .login-button {
            background-color: #0066ff;
            border: 2px solid #0066ff;
            border-radius: 15px;
            font-size: 30px;
            color: white;
            padding: 10px 20px;
        }

        .login-button:hover {
            background-color: #0066ffad;
            border: 2px solid #0066ffad;
        }

        .login-button:disabled,
        button[disabled] {
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            font-size: 30px;
            color: rgba(255, 255, 255, 0.3);
            padding: 10px 20px;
        }

        .field-icon {
            float: right;
            margin-top: -33px;
            margin-right: 30px;
            position: relative;
            z-index: 2;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="bubbles">
        <span style="--i:11;"></span>
        <span style="--i:12;"></span>
        <span style="--i:24;"></span>
        <span style="--i:10;"></span>
        <span style="--i:14;"></span>
        <span style="--i:23;"></span>
        <span style="--i:18;"></span>
        <span style="--i:16;"></span>
        <span style="--i:19;"></span>
        <span style="--i:20;"></span>
        <span style="--i:22;"></span>
        <span style="--i:25;"></span>
        <span style="--i:18;"></span>
        <span style="--i:21;"></span>
        <span style="--i:15;"></span>
        <span style="--i:13;"></span>
        <span style="--i:26;"></span>
        <span style="--i:17;"></span>
        <span style="--i:13;"></span>
        <span style="--i:28;"></span>
        <span style="--i:11;"></span>
        <span style="--i:12;"></span>
        <span style="--i:24;"></span>
        <span style="--i:10;"></span>
        <span style="--i:14;"></span>
        <span style="--i:23;"></span>
        <span style="--i:18;"></span>
        <span style="--i:16;"></span>
        <span style="--i:19;"></span>
        <span style="--i:20;"></span>
        <span style="--i:22;"></span>
        <span style="--i:25;"></span>
        <span style="--i:18;"></span>
        <span style="--i:21;"></span>
        <span style="--i:15;"></span>
        <span style="--i:13;"></span>
        <span style="--i:26;"></span>
        <span style="--i:17;"></span>
        <span style="--i:13;"></span>
        <span style="--i:28;"></span>
    </div>
    <div class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat" style="margin-top: 50px;">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align: center; color: white;">Login</h4>
                                @if ($message = Session::get('gagal'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <form action="{{ Route('login.store') }}" method="POST" class="my-login-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" style="color: white; margin-bottom: 5px;">E-Mail Address</label>
                                        <input id="email" name="email" autocomplete="off" placeholder="Masukkan email..." type="email" class="form-control" @error('email') is-invalid @enderror required autofocus value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            Email is Invalid
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="password" style="color: white; margin-bottom: 5px;">Password
                                        </label>
                                        <input id="password" name="password" autocomplete="off" placeholder="Masukkan password..." type="password" class="form-control" required data-eye>
                                        {{-- <i toggle="#password" class="bi bi-eye-slash field-icon toggle-password" style="cursor: pointer;"></i> --}}
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>

                                    <div class="form-group mt-4 mb-4">
                                        <div class="d-flex justify-content-center">
                                            {{-- <button disabled class='glowing-btn' id="submit" type="submit">
                                                <span class='glowing-txt'>L<span class='faulty-letter'>O</span>GIN</span>
                                            </button> --}}
                                            <button disabled type="submit" id="submit" class="login-button" data-bs-toggle="tooltip" data-bs-placement="left" title="Login">
                                                <i class="bi bi-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
    <script src="{{ asset('t4t5-sweetalert-419427d/docs-src/assets/js/index.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        'use strict';

        $(function() {

            $("input[type='password'][data-eye]").each(function(i) {
                var $this = $(this),
                    id = 'eye-password-' + i,
                    el = $('#' + id);

                $this.wrap($("<div/>", {
                    style: 'position:relative',
                    id: id
                }));

                $this.css({
                    paddingRight: 60
                });
                $this.after($("<div/>", {
                    html: 'Show',
                    class: 'btn btn-primary btn-sm',
                    id: 'passeye-toggle-' + i,
                }).css({
                    position: 'absolute',
                    right: 10,
                    top: ($this.outerHeight() / 2) - 12,
                    padding: '2px 7px',
                    fontSize: 12,
                    cursor: 'pointer',
                }));

                $this.after($("<input/>", {
                    type: 'hidden',
                    id: 'passeye-' + i
                }));

                var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

                if (invalid_feedback.length) {
                    $this.after(invalid_feedback.clone());
                }

                $this.on("keyup paste", function() {
                    $("#passeye-" + i).val($(this).val());
                });
                $("#passeye-toggle-" + i).on("click", function() {
                    if ($this.hasClass("show")) {
                        $this.attr('type', 'password');
                        $this.removeClass("show");
                        $(this).removeClass("btn-outline-primary");
                    } else {
                        $this.attr('type', 'text');
                        $this.val($("#passeye-" + i).val());
                        $this.addClass("show");
                        $(this).addClass("btn-outline-primary");
                    }
                });
            });

            $(".my-login-validation").submit(function() {
                var form = $(this);
                if (form[0].checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.addClass('was-validated');
            });

            $.ajaxSetup({
                headers: {
                    'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script>
        $('#alert').removeClass('d-none');

        setTimeout(() => {
            $('.alert').alert('close');
        }, 4000);




        // submitButton
        const submitButton = document.getElementById('submit');
        var email_filled = 0;
        var password_filled = 0;

        $("#email").keyup(function() {
            var input = $(this);

            if (input.val() == "") {
                email_filled = 0;
            } else {
                email_filled = 1;
            }

            if (email_filled == 1 && password_filled == 1) {
                enableButton();
            } else {
                disableButton();
            }
        });

        $("#password").keyup(function() {
            var input = $(this);

            if (input.val() == "") {
                password_filled = 0;
            } else {
                password_filled = 1;
            }

            if (email_filled == 1 && password_filled == 1) {
                enableButton();
            } else {
                disableButton();
            }
        });

        function disableButton() {
            submitButton.disabled = true;
        }

        function enableButton() {
            submitButton.disabled = false;
        }
    </script>

    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("bi bi-eye");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

</body>

</html>
