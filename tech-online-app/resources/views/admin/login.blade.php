<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Google Font link -->
    <link
      href="https://fonts.googleapis.com/css2?family=Nova+Mono&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <title>Admin Login</title>
</head>
<body>
    <main id="main">
        <section class="userForm background">
            <div class="img">
                <img src="{{ asset('images/login.PNG') }}" alt="" />
            </div>
            <div class="container">
                <div class="userForm-form">
                    <h2 class="form-title">Admin login</h2>
                    <p class="form-desc">Enter your details below</p>
                    <form method="post" action="{{ route('admin.login') }}">
                        <div class="form-input">
                            <input type="text" name="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                                placeholder="Enter your Email or email" />
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-input">
                            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        @csrf
                        <div class="form-btns">
                            <button type="submit" class="form-btn">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
