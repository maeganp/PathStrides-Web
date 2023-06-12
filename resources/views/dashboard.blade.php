<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pathstrides</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class= "bg glass">
            <nav class="navbar navbar-expand-sm navbar-light" id="nav-top">
                <a class="navbar-brand" href="#"><img src="{{ URL('images/finallogo.png') }}" class="logo">   
                <a class="navbar-brand" href="#" id="PathStrides-beside-logo" style="color: #000000">Pathstrides</a>
                <ul class="nav navbar-nav navbar-right" id="top-side-nav">
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <button class="btn btn-info btn-sm" id="home-button">
                                <a id="top-side-nav-icons-home" href="{{ url('dashboard') }}">Home</a>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('logout') }}">
                            <button class="btn btn-info btn-sm" id="user-button">
                                <a id="top-side-nav-icons-user" href="{{ url('logout') }}">Logout</a>
                            </button>
                        </a>
                    </li>
                </ul>
            </nav>
            <hr>

            <div class="row">
                <div class="col-2" id="side-nav">
                    <div class="container-fluid" id="container-for-sidenav">
                        <nav class="navbar" id="nav-side">
                            <nav class="navbar" id="nav-side-inner">


                            @if($admin_login!=null)
                            <p class="logger" id="logger-name">{{$data2->admin_fname}} , {{$data2->admin_lname}}</p>
                                    <p class="logger" id="logger-position">Admin</p>
                                    <hr>
                            @else
                            <p class="logger" id="logger-name">{{$data->user_fname}}, {{$data->user_lname}} </p>
                                    <p class="logger" id="logger-position">Manager</p>
                                    <hr>
                            @endif
                                <ul class="navbar-nav">
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('announcement') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                                <i class='fas'>&#xf0a1;</i>
                                                    Announcements
                                            </button>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('task') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                                <i class='fas'>&#xf0ae;</i>
                                                Tasks
                                            </button>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('admin') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                                <i class='fas'>&#xf0c0;</i>
                                                Employees
                                            </button>
                                        </a>
                                    </li>
                                    @if($admin_login==null)
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('department') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                                <i class='fas'>&#xf19c;</i>
                                                Departments
                                            </button>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('pointshop') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                                <i class='fas'>&#xf07a;</i>
                                                Points Shop
                                            </button>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('taskreport') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                            <i class='fas'>&#xf0ae;</i>
                                                Task Report
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </nav>
                    </div>
                </div>
                <div class="contents-list">
                    <div class="col">
                        <h3 class="ann-header">Announcements</h3>
                        <div class="content-list">
                            <div class="container-tasks">	
                                <div class="container-ann">    	
                                    @include('announcements.announcement_list')	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
        </div>
    </body>
</html>

<style>
     @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    html {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        -webkit-box-sizing: inherit;
        -moz-box-sizing: inherit;
        box-sizing: inherit;
    }

    ::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background-color: rgba(255, 255,255,0.1);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color:#FF7843;;
    width:
}

    body{
        background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
        background-size: cover;
        -webkit-backdrop-filter: brightness(20%);
    }

    hr{
        border-color: black;
        opacity: 40%;
    }

    h3{
        color: black;
        font-size: 16px;
        font-weight: bold;
    }

    .ann-header{
        bottom: 1em;
        margin: 0;
        
    }

    .bg{
        height: 90vh;
        width: 95vw;
        margin: auto;
        margin-top: 45px;
    }

    /* glass effect */
    .glass{
        
        background-color: white;
        border-radius: 10px;

    }

    /* .glass{
        
        background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    } */



    /* top navigation bar */
    #nav-top{
        height: 50px;
        width: 100%;
        margin: 0;
        padding:0;
        position: sticky;
    }

    .navbar-brand{
        font-weight: 600;
        float: left;
        color: #FF7843;
    }

    .logo{
        width: auto;  
        height: 30px;
        margin-left: 1em;
        margin-top: 0.5em;
        color: #FF7843;
    }

    #PathStrides-beside-logo{
        font-weight: bold;
        font-size: 25px;
        margin-top: 0.5em;
    }

    #top-side-nav{
        position: absolute;
        right: 2em;
    }

    #top-side-nav-icons-home, #top-side-nav-icons-user{
        color:black;
        font-size: 15px;
        margin-top: 1.5em;
    }

    #home-button, #user-button{
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
    }
    
    #top-side-nav-icons-home:hover, #top-side-nav-icons-user:hover{
        color: #FF7843;
        font-weight: bold;
        font-size: 17px;
        text-decoration: none;
    }

    /* side nav bar */
    #side-nav{
        float: left;
        margin: 0;
    }

    .logger{
        padding: 0;
        border: 0;
        margin: 0;
    }

    #logger-name{
        font-weight: bold;
        font-size:16px;

    }

    #logger-position{
        font-size: 14px;
        color: #797979;
    }

    #nav-side{
        /* background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(10px); */
        /* -webkit-backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15); */
        width: 13vw;
        height: 76vh;
        padding: 0;
    }

    
    #nav-side-inner{
       bottom: 6em;
        width: 15em;
        border-radius: 10px;
        display: block;
        clear: right;
        float: left;
    }

    #a-nav-side{
        color: black;
        /* font-weight: 600; */
    }
    

    #side-nav-btn{
        background-color: Transparent;
        background-repeat:no-repeat;
        border-width: 2px;
        border-color: Transparent;
        font-size: 13px;
        /* padding: 0; */
        color: #000;
    }

    #side-nav-btn:hover{
        border-radius: 5px;
        border-width: 2px;
        border-color: white;
        color: white;
        font-size: 14px;
        /* color: white; */
        font-weight: bold;
        background-color: #FF7843;
    }

    /* containers */
    .container-announcements, .container-tasks{
        background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
        padding: 1em;
        display: inline-table;
        /* background-color: white; */
        width: 35vw;
        max-height: 35vh;
        height: 35vh;
        margin: 7px;
        border: 1px solid #959595;
    }
    
    .contents-list{
        margin-bottom: 0;
    }
    .container-announcements, .container-tasks{
        /* background-color: #071E41; */
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 5px;
        /* border: 1px solid  #071E41; */
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
        padding: 1em;
        display: inline-table;
        /* background-color: white; */
        width: 75vw;
       max-width: 75vw;
        max-height: 69vh;
        height: 69vh;
        /* margin: 7px; */
    }

    .container-announcements, .container-graph{
        background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
        padding: 1em;
        display: inline-table;
        /* background-color: white; */
        width: 75vw;
        max-height: 35vh;
        height: 35vh;
        margin: 7px;
    }

    .ann-tasks{
        font-weight: bold;
        font-size: 14px;
        margin: 7px;
    }
    .graph-title{
        font-weight: bold;
        font-size: 14px;
        margin: 7px;
    }

    .modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
}

    

    /* .container-ann, .container-tas{
        background-color: white;
        border-radius: 5px;
        padding: 1em;
    } */
</style>
