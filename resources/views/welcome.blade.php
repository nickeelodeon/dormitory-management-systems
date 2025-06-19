<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="vh-100 m-0">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 p-0">
                <img src="{{ asset('images/dorm.jpg') }}" alt="My Photo"
                     class="w-100 h-100" style="object-fit: cover;">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-start pt-5" style="background-color: #213448;">
                <div class="border rounded p-5 shadow text-center mt-1" style="background-color: #94B4C1;">
                    <img src="{{ asset('images/logo.png') }}" alt="My Photo" class="d-block" style="width: 300PX; height: auto; object-fit: cover; display: block; margin-left: auto; margin-right: auto;">
                    <a href="{{ route('register') }}" role="button">
                        <button type="submit" class="btn btn-primary mt-3 ">Register Now!</button>
                    </a><br>
                    <a href="{{ route('login') }}" role="button">
                        <button type="submit" class="btn btn-secondary mt-3">Already have an Account?</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
