<x-login>
    <x-slot name="title">Register</x-slot>
    <x-slot name="main">


        <div class="container">
            <h1 style="text-align:center;">Register</h1>

            <form action="register" method="post">
                @csrf


                <input type="text" name="username" id="" placeholder="Enter your name"><br>
                    
                @error('username')
                    <span class="alert alert-danger" role="alert"> {{ $message }} </span>
                @enderror <br><br>


                <input type="text" name="email" placeholder="Enter your email"><br>
                @error('email')
                    <span class="alert alert-danger" role="alert"> {{ $message }} </span>
                @enderror
                <br>
                <br>


                <input type="password" name="password" placeholder="Enter your password"><br>
                @error('password')
                    <span class="alert alert-danger" role="alert"> {{ $message }}</span>
                @enderror
                <br><br>

                <input type="password" name="password_confirmation" placeholder="Enter your password"><br><br>

                <button type="submit" class="btn">Submit</button>

            </form>

            <a href="login">Already have an account ?</a>

        </div>


        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .container {
                width: 100%;
                max-width: 350px;
                padding: 20px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                margin: 20px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            /* .container:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            } */

            .input-group {
                margin-bottom: 20px;
                position: relative;
            }

            input {
                width: 100%;
                padding: 14px 16px;
                border: 2px solid #e1e5e9;
                border-radius: 12px;
                font-size: 16px;
                transition: all 0.3s ease;
                box-sizing: border-box;
                background: #fafbfc;
            }

            input:focus {
                outline: none;
                border-color: #4a90e2;
                background: white;
                box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
            }

            input:hover {
                border-color: #b8c1ca;
            }

            .error {
                color: #e74c3c;
                font-size: 14px;
                margin-top: 25px;
                display: block;
            }

            .link-group {
                text-align: center;
                margin-bottom: 24px;
            }

            .link-group a {
                color: #4a90e2;
                text-decoration: none;
                font-size: 14px;
                transition: color 0.3s ease;
            }

            .link-group a:hover {
                color: #357abd;
                text-decoration: underline;
            }

            .btn {
                width: 100%;
                padding: 14px;
                background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
                color: white;
                border: none;
                border-radius: 12px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 16px rgba(74, 144, 226, 0.3);
            }

            .btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 20px rgba(74, 144, 226, 0.4);
                background: linear-gradient(135deg, #357abd 0%, #2c6ab3 100%);
            }

            .btn:active {
                transform: translateY(0);
                box-shadow: 0 2px 8px rgba(74, 144, 226, 0.3);
            }

            /* Responsive */
            @media (max-width: 480px) {
                .container {
                    max-width: 90%;
                    margin: 10px;
                    padding: 16px;
                }

                input,
                .btn {
                    font-size: 16px;
                    /* Prevent zoom on mobile */
                }
            }
        </style>
    </x-slot>
</x-login>
