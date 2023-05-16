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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class= "bg glass">
        <nav class="navbar navbar-expand-sm navbar-light" id="nav-top">

            <a class="navbar-brand" href="#"><img src="{{ URL('images/pathstrides-white.png') }}" class="logo">
                
            <a class="navbar-brand" href="#" id="PathStrides-beside-logo" style="color: #FFFFFF">Pathstrides</a>
            <ul class="nav navbar-nav navbar-right" id="top-side-nav">
            <li><a href="{{ url('dashboard') }}"><button class="btn btn-info btn-sm" id="home-button"><i class="fa fa-home" id="top-side-nav-icons-home"></i></button></a></li>
               
                <li><a href="{{ url('logout') }}"><button class="btn btn-info btn-sm" id="user-button"><i class="fa fa-user-circle" id="top-side-nav-icons-user"></i></button></a></li>
            </ul>
        </nav>

        <hr>

        <div class="row">
            <div class="col-2" id="side-nav">
                <div class="container-fluid" id="container-for-sidenav">
                    <nav class="navbar" id="nav-side">
                            <nav class="navbar" id="nav-side-inner">
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
                                        <a class="nav-link" href="{{ url('reportask') }}" id="a-nav-side">
                                            <button class="btn btn-info btn-sm" id="side-nav-btn">
                                                <i class='fas'>&#xf0ae;</i>
                                                Report Tasks
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
            
                           
</div>
            </div>
                    <div class="col">
                        <!-- <h3 class="title">Employees</h3> -->
                        <div class="content-list">
                            <div class="container-ann">
                                <div style="overflow-y: auto; overflow-x:hidden;">
                                    @yield('content')
                                </div>
                            </div>
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
        background-image: url("images/bg7.jpg");
        background-size: cover;
        -webkit-backdrop-filter: brightness(20%);
    }

    hr{
        border-color: white;
        opacity: 20%;
    }

    h3{
        color: white;
    }

    .bg{
        height: 90vh;
        width: 95vw;
        margin: auto;
        margin-top: 45px;
    }

    /* glass effect */
    .glass{
        
        background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
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

    #top-side-nav-icons-home{
        color:#FFFFFF;
        font-size: 30px;
        margin-top: 0.5em;
    }

    #top-side-nav-icons-notif{
        color:#FFFFFF;
        font-size: 30px;
        margin-top: 0.5em;
    }
    

    #top-side-nav-icons-user{
        color:#FFFFFF;
        font-size: 30px;
        margin-top: 0.5em;
    }

    #home-button, #notif-button, #user-button{
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
    }

    #top-side-nav-icons-home:hover, #top-side-nav-icons-notif:hover, #top-side-nav-icons-user:hover{
        color: #FF7843;
    }

    /* side nav bar */
    #side-nav{
        float: left;
        margin: 0;
    }

    #nav-side{
        background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
        width: 12vw;
        height: 76vh;
        padding: 0;
    }

    
    /* #nav-side-inner{
        background-color: rgba(255, 255,255,0.05);
        width: 15em;
        border-radius: 10px;
        display: block;
        clear: right;
        float: left;
    } */

    #a-nav-side{
        color: white;
        font-weight: 600;
    }
    

    #side-nav-btn{
        background-color: Transparent;
        background-repeat:no-repeat;
        border-width: 2px;
        border-color: Transparent;
        font-size: 12.5px;
        font-weight: bold;
        /* padding: 0; */
    }

    #side-nav-btn:hover{
        border-radius: 5px;
        border-width: 2px;
        border-color: white;
        color: #FF7843;
        /* color: white; */
        /* font-weight: bold; */
        background-color: rgba(255, 255, 255, 1.0);
    }


    #top-employees-title{
        margin: 0;
        padding-bottom: 0.3em;
        color: white;
        font-size: 14px;
        font-weight: bold;
    }

    #top-employees{
        font-size: 13px;
        color: white;
    }

    /* containers */
    .content-list{
        background: linear-gradient(135deg, rgba(255, 255,255,0.1), rgba(255,255, 255,0));
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 5px;
        border: 1px solid rgba(255, 255,255,0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
        padding: 1em;
        /* background-color: white; */
        height: 75.85vh;
        width: 75vw;
        float: left;
    }

    

    /* content */

    .titles{
        font-weight: bold;
        font-size: 16px;
        clear: left;
        color: white;
    }
    
    #employee-container{
        background-color: Transparent;
        background-repeat:no-repeat;
        border-radius: 5px;
    }

    .card{
        border: none;
        background-color: Transparent;
        background-repeat:no-repeat;
        color: white;
    }

    .card-header{
        display: flex;
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        padding: 0;
        
    }

    .add{
        float: right;
        font-size: 14px;
        color: white;
        padding: 7px;
        margin-right: 2em;
    }

    .add:hover{
        float: right;
        border-radius: 5px;
        font-size: 14px;
        color: #FF7843;
        text-decoration: none;
        background:white;
        font-weight: bold;
    }

    .card-body{
        max-height: 67vh;
        padding: 0;
    }

    /* .table-responsive{
        width: 80 vw;
        max-width: 80vw; 
    } */

    table{
        width: 80 vw;
        max-width: 80vw;
    }

    th{
        font-size: 14px;
        margin: auto;
        color: white;
    }

    td{
        color: white;
        font-size: 12px;
    }

    
    #actbtn{
        background-color: transparent;
        border-color: transparent;
        color: white;
    }

    #actbtn:hover{
        background-color: white;
        border-color: white;
        color: #FF7843;
    }

    #tables-responsives{
        width: 75vw;
        max-width: 75vw;
    }

    #tables{
        width: 75vw;
        max-width: 75vw;
    }

    .column-padding{
        padding: none;
    }

    .modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
}
    
</style>