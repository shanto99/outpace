<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.naksoid.com/elephant/materialistic-blue/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2016 21:25:39 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form layouts &middot; Elephant Template &middot; The fastest way to build modern admin site for any platform, browser, or device</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:url" content="http://demo.naksoid.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta property="og:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:image" content="../img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@naksoid">
    <meta name="twitter:creator" content="@naksoid">
    <meta name="twitter:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta name="twitter:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta name="twitter:image" content="../img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('src/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ URL::to('src/img/outpace.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ URL::to('src/img/outpace.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ URL::to('src/js/manifest.json') }}">
    <link rel="mask-icon" href="{{ URL::to('src/js/manifest.json') }}" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{ URL::to('src/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/elephant.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/application.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/style.css') }}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body class="layout layout-header-fixed">
<div class="layout-header">
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand navbar-brand-center" href="index-2.html">
                <img class="navbar-brand-logo" src="{{ URL::to('src/img/outpace.png') }}" alt="Elephant">
            </a>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
                <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
            </button>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="{{ URL::to('src/img/0180441436.jpg') }}" alt="Teddy Wilson">
            </span>
            </button>
        </div>
        <div class="navbar-toggleable">
            <nav id="navbar" class="navbar-collapse collapse">
                <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
                    <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
                </button>
                <ul class="nav navbar-nav navbar-right">
                    <li class="visible-xs-block">
                        <h4 class="navbar-text text-center">Hi, Teddy Wilson</h4>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <form class="navbar-search navbar-search-collapsed">
                            <div class="navbar-search-group">
                                <input class="navbar-search-input" type="text" placeholder="Search for people, companies, and more&hellip;">
                                <button class="navbar-search-toggler" title="Expand search form ( S )" aria-expanded="false" type="submit">
                                    <span class="icon icon-search icon-lg"></span>
                                </button>
                                <button class="navbar-search-adv-btn" type="button">Advanced</button>
                            </div>
                        </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-envelope-o icon-lg"></span>
                    <span class="badge badge-danger badge-above right">8</span>
                  </span>
                  <span class="visible-xs-block">
                    <span class="icon icon-envelope icon-lg icon-fw"></span>
                    <span class="badge badge-danger pull-right">8</span>
                    Messages
                  </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                            <div class="dropdown-header">
                                <a class="dropdown-link" href="compose.html">New Message</a>
                                <h5 class="dropdown-heading">Recent messages</h5>
                            </div>
                            <div class="dropdown-body">
                                <div class="list-group list-group-divided custom-scrollbar">
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="{{ URL::to('src/img/0299419341.jpg') }}" alt="Harry Jones">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">16 min</small>
                                                <h5 class="notification-heading">Harry Jones</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Hi Teddy, Just wanted to let you know we got the project! We should be starting the planning next week. Harry</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0310728269.jpg" alt="Daniel Taylor">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">2 hr</small>
                                                <h5 class="notification-heading">Daniel Taylor</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Teddy Boyyyy, label text isn't vertically aligned with value text in grid forms when using .form-control... DT</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0460697039.jpg" alt="Charlotte Harrison">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">Sep 20</small>
                                                <h5 class="notification-heading">Charlotte Harrison</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Dear Teddy, Can we discuss the benefits of this approach during our Monday meeting? Best regards Charlotte Harrison</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0531871454.jpg" alt="Ethan Walker">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">Sep 19</small>
                                                <h5 class="notification-heading">Ethan Walker</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">If you need any further assistance, please feel free to contact us. We are always happy to assist you. Regards, Ethan</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0601274412.jpg" alt="Sophia Evans">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">Sep 18</small>
                                                <h5 class="notification-heading">Sophia Evans</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Teddy, Please call me when you finish your work! I have many things to discuss. Don't forget call me !! Sophia</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0777931269.jpg" alt="Harry Walker">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">Sep 17</small>
                                                <h5 class="notification-heading">Harry Walker</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Thank you for your message. I am currently out of the office, with no email access. I will be returning on 20 Jun.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="{{ URL::to('src/img/0872116906.jpg') }}" alt="Emma Lewis">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">Sep 15</small>
                                                <h5 class="notification-heading">Emma Lewis</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Teddy, Please find the attached report. I am truly sorry and very embarrassed about not finishing the report by the deadline.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0980726243.jpg" alt="Eliot Morgan">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">Sep 15</small>
                                                <h5 class="notification-heading">Eliot Morgan</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Dear Teddy, Please accept this message as notification that I was unable to work yesterday, due to personal illness.m</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a class="dropdown-btn" href="#">See All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-bell-o icon-lg"></span>
                    <span class="badge badge-danger badge-above right">7</span>
                  </span>
                  <span class="visible-xs-block">
                    <span class="icon icon-bell icon-lg icon-fw"></span>
                    <span class="badge badge-danger pull-right">7</span>
                    Notifications
                  </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                            <div class="dropdown-header">
                                <a class="dropdown-link" href="#">Mark all as read</a>
                                <h5 class="dropdown-heading">Recent Notifications</h5>
                            </div>
                            <div class="dropdown-body">
                                <div class="list-group list-group-divided custom-scrollbar">
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <span class="icon icon-exclamation-triangle bg-warning rounded sq-40"></span>
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">35 min</small>
                                                <h5 class="notification-heading">Update Status</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Failed to get available update data. To ensure the proper functioning of your application, update now.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <span class="icon icon-flag bg-success rounded sq-40"></span>
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">43 min</small>
                                                <h5 class="notification-heading">Account Contact Change</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">A contact detail associated with your account teddy.wilson, has recently changed.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <span class="icon icon-exclamation-triangle bg-warning rounded sq-40"></span>
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">1 hr</small>
                                                <h5 class="notification-heading">Failed Login Warning</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">There was a failed login attempt from "192.98.19.164" into the account teddy.wilson.</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0310728269.jpg" alt="Daniel Taylor">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">4 hr</small>
                                                <h5 class="notification-heading">Daniel Taylor</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Like your post: "Everything you know about Bootstrap is wrong".</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0872116906.jpg" alt="Emma Lewis">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">8 hr</small>
                                                <h5 class="notification-heading">Emma Lewis</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Like your post: "Everything you know about Bootstrap is wrong".</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0601274412.jpg" alt="Sophia Evans">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">8 hr</small>
                                                <h5 class="notification-heading">Sophia Evans</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Like your post: "Everything you know about Bootstrap is wrong".</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="#">
                                        <div class="notification">
                                            <div class="notification-media">
                                                <img class="rounded" width="40" height="40" src="img/0180441436.jpg" alt="Teddy Wilson">
                                            </div>
                                            <div class="notification-content">
                                                <small class="notification-timestamp">9 hr</small>
                                                <h5 class="notification-heading">Teddy Wilson</h5>
                                                <p class="notification-text">
                                                    <small class="truncate">Published a new post: "Everything you know about Bootstrap is wrong".</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a class="dropdown-btn" href="#">See All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown hidden-xs">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="upgrade.html">
                                    <h5 class="navbar-upgrade-heading">
                                        Upgrade Now
                                        <small class="navbar-upgrade-notification">You have 15 days left in your trial.</small>
                                    </h5>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="navbar-upgrade-version">Version: 1.0.0</li>
                            <li class="divider"></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="{{ route('logout') }}">Sign out</a></li>
                        </ul>
                    </li>
                    <li class="visible-xs-block">
                        <a href="contacts.html">
                            <span class="icon icon-users icon-lg icon-fw"></span>
                            Contacts
                        </a>
                    </li>
                    <li class="visible-xs-block">
                        <a href="profile.html">
                            <span class="icon icon-user icon-lg icon-fw"></span>
                            Profile
                        </a>
                    </li>
                    <li class="visible-xs-block">
                        <a href="login-1.html">
                            <span class="icon icon-power-off icon-lg icon-fw"></span>
                            Sign out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="layout-main">
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
            <div class="custom-scrollbar">
                <nav id="sidenav" class="sidenav-collapse collapse">
                    <ul class="sidenav">
                        <li class="sidenav-search hidden-md hidden-lg">
                            <form class="sidenav-form" action="http://demo.naksoid.com/">
                                <div class="form-group form-group-sm">
                                    <div class="input-with-icon">
                                        <input class="form-control" type="text" placeholder="Search…">
                                        <span class="icon icon-search input-icon"></span>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="sidenav-heading">Navigation</li>
                        <li class="sidenav-item has-subnav">
                            <a href="{{ route('profile') }}" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-home"></span>
                                <span class="sidenav-label">Profile</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('createpi') }}">
                                <span class="sidenav-icon icon icon-th"></span>
                                <span class="sidenav-label">Create PI</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('createlc') }}">
                                <span class="sidenav-icon icon icon-th"></span>
                                <span class="sidenav-label">Create LC</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('create_document') }}">
                                <span class="sidenav-icon icon icon-th"></span>
                                <span class="sidenav-label">Create Document</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('edit_bank_info') }}">
                                <span class="sidenav-icon icon icon-th"></span>
                                <span class="sidenav-label">Edit Bank Information</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('edit_buyer_info') }}">
                                <span class="sidenav-icon icon icon-th"></span>
                                <span class="sidenav-label">Edit Buyer Information</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('notification') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Notifications</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('products') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Products</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('search') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Search</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Create PI</span>
                </h1>

            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="demo-form-wrapper">

                        <div class="md-form-group">
                            <label for="do_id">DO ID</label>
                            <input id="do_id" name="do_id" class="md-form-control" type="text" value="{{ $do_detail->order_no }}">
                            <label class="md-control-label"></label>
                        </div>
                        <div class="md-form-group">
                            <label for="approved_by">Do Approved By</label>
                            <input id="approved_by" class="md-form-control" type="text" value="{{ $do_detail->approve_by }}" required>
                            <label class="md-control-label"></label>
                        </div>
                        <div id="PItablediv">
                            <table id="PITable" border = "1" style="margin-left: -300px; margin-bottom: 10px;width: 100% ">
                                <thead>
                                <td><h5>SL</h5></td>
                                <td><h5>Description</h5></td>
                                <td><h5>Quantity</h5></td>
                                <td><h5>Unit Price</h5></td>
                                <td><h5>Total Price</h5></td>
                                <td>Delivered</td>
                                <td><h5>Delete?</h5></td>
                                <td><h5>Add Rows?</h5></td>
                                </thead>
                                <tr>
                                    <td><input size=25 type="text" name="myinput" id="sl" value="1"/></td>
                                    <td><input size=25 type="text" name="myinput" id = "description" class="description"/></td>
                                    <td><input size=25 type="text" name="myinput" id="quantity"/></td>
                                    <td><input size=25 type="text" name="myinput" class = "unit_price" id = "unit_price"></td>
                                    <td><input size=25 type="text" name="myinput" class = "total_price" id = "totalprice"></td>
                                    <td><input size=25 type="text" name="myinput" class = "delivered" id = "delivered"></td>
                                    <td><input type="button" id="delPOIbutton" value="Delete"
                                               onclick="deleteRow(this)"/></td>
                                    <td><input type="button" id="addmorePOIbutton" value="Add More POIs"
                                               onclick="createRow()"/></td>
                                </tr>
                            </table>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" id="save_ad_do">Save & Confirm</button>
                        <button class="btn btn-primary btn-block" type="submit">Show PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{--<script src="{{ URL::to('src/js/vendor.min.js') }}"></script>--}}
<script src="{{ URL::to('src/js/elephant.min.js') }}"></script>
<script src="{{ URL::to('src/js/application.min.js') }}"></script>
<script src="{{ URL::to('src/js/demo.min.js') }}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
</script>
<script>
    var availableTags = [];
    var unit_price;
    $( function() {

        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ route('get_goods') }}",
            success: function (data) {
                for(i=0;i<data.length;i++){
                    availableTags.push(data[i].name);
                }
            }
        });
        $( ".description" ).on("focus",function () {
            $(this).autocomplete({
                source: availableTags,
                minLength: 2
            })
        });
        var do_id = document.getElementById("do_id").value;
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ route('populate_advance_goods') }}",
            data: {do_id: do_id },
            success: function (data) {
                //console.log(data);
                if(data.length>0){
                    var i;
                    for(i = 0; i<data.length; i++){

                        if(i==0){
                            document.getElementById('description').value = data[i].description;
                            document.getElementById('quantity').value = data[i].quantity;
                            document.getElementById('unit_price').value = data[i].unit_price;
                            var quantity = document.getElementById('quantity').value;
                            var unitprice = document.getElementById('unit_price').value;
                            var totalprice = quantity*unitprice;
                            document.getElementById('totalprice').value = totalprice;
                            document.getElementById('delivered').value = data[i].requested;
                        }
                        else{

                        }
                        insRow(data,i);
                    }
                    document.getElementById('PITable').deleteRow(1);
                }
                else{
                    alert("No goods Found");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    } );
    function insRow(data,i) {
        var x = document.getElementById('PITable');
        var new_row = x.rows[1].cloneNode(true);
        var len = x.rows.length;
        //new_row.cells[0].innerHTML = len;
        var inp1 = new_row.cells[0].getElementsByTagName('input')[0];
        inp1.id += len;
        if(len == 2){
            inp1.value = 1;
        }
        else{
            var slLen = len-1
            inp1.value = slLen;
        }

        len = len-1;


        var inp2 = new_row.cells[1].getElementsByTagName('input')[0];
        var inp2_id = inp2.id + len;
        inp2.id  = inp2_id;
        inp2.value = data[i].description;
        var inp3 = new_row.cells[2].getElementsByTagName('input')[0];
        var inp3_id = inp3.id+len;
        inp3.id  = inp3_id;
        var quantity = data[i].quantity;
        inp3.value = quantity;
        var inp4 = new_row.cells[3].getElementsByTagName('input')[0];
        var inp4_id = inp4.id+len;
        inp4.id  = inp4_id;
        var unitprice = data[i].unit_price;
        inp4.value = unitprice;
        var inp5 = new_row.cells[4].getElementsByTagName('input')[0];
        var inp5_id = inp5.id + len;
        inp5.id = inp5_id;
        inp5.value = quantity*unitprice;
        var inp6 = new_row.cells[5].getElementsByTagName('input')[0];
        var inp6_id = inp6.id + len;
        inp6.id = inp6_id;
        if(data[i].requested == 1){
            inp6.value = "Delivered";
        }else{
            inp6.value = "To be Delivered"
        }

        var inp7 = new_row.cells[6].getElementsByTagName('input')[0];
        var inp7_id = inp7.id + len;
        inp7.id = inp7_id;
        var inp8 = new_row.cells[7].getElementsByTagName('input')[0];
        inp8.id+= len;
        x.appendChild(new_row);
    }


    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        alert(i);
        document.getElementById('PITable').deleteRow(i);
    }

    function createRow() {
        var x = document.getElementById('PITable');
        var new_row = x.rows[1].cloneNode(true);
        var len = x.rows.length;
        //new_row.cells[0].innerHTML = len;
        var inp1 = new_row.cells[0].getElementsByTagName('input')[0];
        inp1.id += '';
        inp1.value = len;
        var inp2 = new_row.cells[1].getElementsByTagName('input')[0];
        inp2.id += '';
        inp2.class = 'description';
        inp2.value = '';
        var inp3 = new_row.cells[2].getElementsByTagName('input')[0];
        inp3.id += '';
        inp3.value = '';
        $(inp2).on('focus', function () {
            $(this).autocomplete({
                source: availableTags,
                minLength: 2
            })
        });
        x.appendChild(new_row);
    }

    $("#save_ad_do").click(function () {
        alert("hello");
        var do_id = document.getElementById("do_id").value;
        var rowdata = new Array();
        $('#PITable tr').each(function (row, tr) {
            if (row > 0) {
                var rowIndex = row - 1;
                if($(tr).find("td:eq(5) input[type = 'text']").val() == 'Delivered'){
                    var request = 1;
                }
                else{
                    request = 0;
                }
                alert(request);
                rowdata[rowIndex] = {
                    "sl": $(tr).find("td:eq(0) input[type='text']").val()
                    , "description": $(tr).find("td:eq(1) input[type='text']").val()
                    , "quantity": $(tr).find("td:eq(2) input[type='text']").val()
                    , "unit_price": $(tr).find("td:eq(3) input[type='text']").val()
                    , "total_price": $(tr).find("td:eq(4) input[type='text']").val()
                    , "status": request
                };

            }

        });
    $.ajax({
        type: "GET",
        cache: false,
        data: {rowdata: rowdata, do_id: do_id},
        url: "{{ route('confirm_advance_do') }}",
        success: function(data){
            alert(JSON.stringify(data));
        }
    })
    })
</script>
</body>

<!-- Mirrored from demo.naksoid.com/elephant/materialistic-blue/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2016 21:25:40 GMT -->
</html>