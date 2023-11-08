<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        :root {
            --color1: #EBECF0;
            --fontSize0: 8px;
            --fontSize1: 12px;
            --fontSize2: 14px;
            --fontSize3: 18px;
        }

        body {
            font-family: cursive;
            background-color: var(--color1);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .wrapper {

            width: 300px;

        }

        .login_page {
            height: 100%;
            display: flex;
            /* background-color: red; */
            flex-direction: column;
            gap: 20PX;
            align-items: center;
            justify-content: flex-start;
        }

        .tittle {

            color: #babecc;
            font-size: var(--fontSize1);
            margin-top: 35px;
            margin-bottom: 15px;
        }

        .input {
            margin-bottom: -10px;
            background-color: var(--color1);
            height: 3px;
            /* width: 100%; */
            padding: 16px;
            outline: none;
            border: none;
            box-shadow: inset 1px 1px 3px 0px rgb(32 36 75 / 29%), inset -2px -4px 4px 0 rgb(255 255 255);
            border-radius: 20px;


        }

        .userpass {
            width: 80%;

        }


        .input::placeholder {
            font-size: 10px;

        }

        button {

            width: 2px;
            box-shadow: 1px 7px 9px -6px rgba(0, 0, 0, 0.492), -1px -8px 15px -2px rgb(255 255 255);
            border: none;

            background-color: var(--color1);


        }

        button:hover {
            box-shadow: 0 0 4px -1px rgba(0, 0, 0, 0.492);
            transition: 250ms;

        }

        button:active {
            box-shadow: 0.5px 0.5px 1px 0px rgb(0 0 0 / 62%) inset, inset -1px -1px 1px 0 rgb(255 255 255);


        }

        .login_btn {

            font-family: cursive;
            color: purple;
            height: 10px;
            font-size: var(--fontSize1);
            width: 65%;
            border-radius: 20px;
            padding: 15px;
            line-height: var(--fontSize1);
            /* margin: 0 auto; */
            /* transition: 250ms; */

        }

        .icons {
            height: 25px;
            /* width: 40px; */
            display: flex;
            gap: 10px;

        }

        .squ {
            padding: 7px;
            height: 20px;
            width: 20px;
            /* width: 15px; */
            border-radius: 5px;
            align-items: center;
        }

        .icon_style {
            color: rgb(101, 100, 108);
            width: 10px;
        }

        .lock {
            color: purple;
        }

        .search {
            align-items: center;
            justify-content: center;
            width: 100%;
            display: flex;
            gap: 10px;

        }

        .search_input {
            width: 60%
        }

        .search_icon {
            width: 9%;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form class="login_page" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="tittle">
                <h1>Sign In</h1>
            </div>
            {{-- <input class="input userpass" type="email" placeholder="Email Address"> --}}
            {{-- <input class="input userpass" type="password" placeholder="Password"> --}}

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="input userpass @error('email') is-invalid @enderror"
                    name="email" id="email" placeholder="Enter your email!"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="input userpass @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="Enter your password!">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="login_btn" type="submit" name="submit" value="Login"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" class="icon_style lock">
                    <path fill-rule="evenodd"
                        d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                        clip-rule="evenodd" />
                </svg>
                Log in</button>
                {{-- <div class="mb-3">
                    <input type="submit" name="submit" value="Login" class="login_btn btn btn-primary">
                </div> --}}
        </form>
    </div>
</body>

</html>

</html>
