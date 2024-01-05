<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/image/logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login - Kasir</title>

    <style>
        .btn-index {
            background-color: #fff;
            border-radius: 6px;
            border: 1px solid #000;
        }

        body {
            background-image: url("/image/wallpaper.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            user-select: none;
        }

        .bglogin {
            background: rgb(255, 0, 0);
            background: linear-gradient(0deg, rgba(255, 0, 0, 1) 0%, rgba(195, 42, 53, 1) 62%);
        }

        .inputt {
            background: #fff;
            box-shadow: 2px 2px 2px 2px #00000059;
            width: 100%;
            height: 70px;
            margin-bottom: 16px;
            border-radius: 30px;
        }

        .inpurt {
            border: none;
            outline-color: none;
            border-radius: 30px;
            font-size: 20px;
        }

        .inpurt:focus {
            border: none;
            box-shadow: none;
            outline: none;
            border-color: none;
        }
    </style>
</head>

<body>
    {{-- Start Modal --}}

    <div class="modal fade bg-white" id="register" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="bglogin" style="border-bottom-left-radius: 120px;">
                        <button data-bs-dismiss="modal" aria-label="Close" class="btn" style="font-size: 30px; color: white"><i class="bi bi-arrow-left"></i></button>

                        <div class="d-flex justify-content-center">
                            <img src="/image/kimwhite1.png" class="w-50 mt-1">
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <h3 class="p-3 text-white">Registrasi</h3>
                        </div>
                    </div>
                    <form action="register" method="POST">
                        @csrf
                        <div class="form-group container mt-3 p-4">
                            <div class="d-flex inputt">
                                <i class="bi bi-envelope p-3 mb-3 text-danger" style="font-size: 25px;"></i>
                                <input class="inpurt form-control" type="email" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="d-flex inputt">
                                <i class="bi bi-person-circle p-3 mb-3 text-danger" style="font-size: 25px;"></i>
                                <input class="inpurt form-control" type="text" name="username" id="username" placeholder="Username" required>
                            </div>
                            <div class="d-flex inputt">
                                <i class="bi bi-key p-3 mb-3 text-danger" style="font-size: 25px;"></i>
                                <input class="inpurt form-control" type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center flex-column mb-2 container">
                            <button class="btn btn-danger w-100 p-3 mb-4" style="border-radius: 200px" type="submit" name="submit">Register</button>

                            <span class="d-flex justify-content-center">
                                Sudah punya akun?&ensp;
                                <a class="text-primary" type="button" data-bs-toggle="modal" data-bs-target="#login">Login!</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Login -->
    <div class="modal fade bg-white" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="bglogin" style="border-bottom-left-radius: 120px;">
                        <button data-bs-dismiss="modal" aria-label="Close" class="btn" style="font-size: 30px; color: white"><i class="bi bi-arrow-left"></i></button>

                        <div class="d-flex justify-content-center">
                            <img src="/image/kimwhite1.png" class="w-50 mt-1">
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <h3 class="p-3 text-white">Login</h3>
                        </div>
                    </div>
                    <form action="">
                        <div class="form-group container mt-3 p-4">
                            <div class="d-flex inputt">
                                <i class="bi bi-person-circle p-3 mb-3 text-danger" style="font-size: 25px;"></i>
                                <input class="inpurt form-control" type="text" name="" id="" placeholder="Username" required>
                            </div>
                            <div class="d-flex inputt">
                                <i class="bi bi-key p-3 mb-3 text-danger" style="font-size: 25px;"></i>
                                <input class="inpurt form-control" type="password" name="" id="" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center flex-column mb-2 container">
                            <button class="btn btn-danger w-100 p-3 mb-4" style="border-radius: 200px" type="submit">Login</button>

                            <span class="d-flex justify-content-center">
                                Kim-JF, 123 Van Ness. Surabaya
                                {{-- <a class="text-primary" type="button" data-bs-toggle="modal" data-bs-target="#register">Register!</a> --}}
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modal --}}


    <div class="container">
        <div class="bg-white rounded" style="height: 90vh; opacity: 0.9">
            <div class="d-flex justify-content-center mt-4 mb-5">
                <img src="/image/logo1.png" class="w-75 mt-3">
            </div>
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <h6 style="font-weight: bold; letter-spacing: 2px;">Korean Authentic Restaurant</h6>
                    </div>
                    <div class="container mt-4">
                        {{-- <div class="d-flex justify-content-center">
                            <button class="btn btn-warning w-100 p-3" style="background-color: #c32a35; color: #fff;" data-bs-toggle="modal" data-bs-target="#register">Register</button>
                        </div> --}}
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-danger w-100 p-3" data-bs-toggle="modal" data-bs-target="#login">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
