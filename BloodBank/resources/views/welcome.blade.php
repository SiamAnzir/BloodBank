<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blood Bank</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Looking For Blood??
                </div>
                <div class="form-group row">
                    <form method="get" action ="{{route('search')}}">
                    <label class="col-8 col-form-label text-left">{{ __('Blood Group')}}</label>

                    <div class="col-md-12">
                        <select name="blood_group_id">
                            @foreach($bloodGroups as $bloodGroup)
                                <option value="{{$bloodGroup->id}}">{{$bloodGroup->blood_group}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="address">{{ __('Divison')}}</label>
                        <input type="text" name="address" required>
                        
                    </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit')}}
                            </button>
                        </div>
                    </form>
                </div>

                <div>
                    @foreach($users as $user)
                        <li>
                            Name: {{$user->name}}
                            <br>
                            Divison: {{$user->address}}
                            <br>
                            Phone No: {{$user->phone_no}}
                            <br>
                            Last Donation Date: {{$user->last_donation_date}}

                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
