<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Rao vặt</title>
   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <meta name="csrf-token" content="{{csrf_token()}}" />
   <script src="{{asset("assets/public/asset/js/")}}/custom.js"></script>
    <style>
           html, body {
               background-color: #fff;
               color: #636b6f;
               font-family: 'Raleway', sans-serif;
               font-weight: 100;
               height: 100vh;
               margin: 0;
           }
          
           .full-height {
               height: 100vh;
           }

           .flex-center {
               /* align-items: center; */
               display: flex;
               justify-content: center;
           }

           .content {
               text-align: center;
           }

           .title {
               font-size: 84px;
               text-align: center;
           }

           .m-b-md {
               margin-bottom: 30px;
           }
           .text
           {
                font-size: 30px;
           }
       </style>
</head>
<body>
   <ul style="list-style: none">
            <li class="nav-item dropdown">
            <img src="{{asset('assets/admin/default/admin.png')}}"  
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
                                
                 <div  class="text" href="#">
                                    {{ Auth::user()->name }}
                                <div>
                                <div class=" text"  style="padding-left: 55px">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                               
        </li>
        </ul>    
            <div class="title m-b-md flex-center full-height">
       Action unauthorized!
   </div>
</body>
</html>