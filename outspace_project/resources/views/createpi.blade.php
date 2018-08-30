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
                        <li class="sidenav-item">
                            <a href="{{ route('order_in_hand') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Order In Hand</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('add_del_com') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Add Delivery Completion Date</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('wfca') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">WFCA</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('add_bank_submission_ref') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Add Bank Submission/Ref</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('wfba') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">WFBA</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('add_maturity') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">ADD Maturity</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('drp') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">DRP</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('add_purchase_date') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Add Purchase Date</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('purchase_table') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Purchase Table</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('payment_receive') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Payment Receive</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('realization_table') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Realization Table</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('daily_input') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Daily Input</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('return_goods') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Input Return</span>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('replacement_input') }}">
                                <span class="sidenav-icon icon icon-columns"></span>
                                <span class="sidenav-label">Relplacement Input</span>
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
                            <label for="pi_id">PI ID</label>
                            <input id="pi_id" class="md-form-control" type="text">
                            <label class="md-control-label"></label>
                        </div>
                        <div class="md-form-group">
                            <label for="revision">Revision</label>
                            <input id="revision" class = "revision" class="md-form-control" type="text">
                            <label class="md-control-label"></label>
                        </div>
                        <div class="md-form-group">
                            <label for="offer_validity">Offer Validity</label>
                            <input id="offer_validity" class="md-form-control datepicker" type="text" data-provide="datepicker"
                                   data-date-today-highlight="true">
                            <label class="md-control-label"></label>
                        </div>
                        <div class="md-form-group">
                            <label class="control-label" for="select_a_buyer">Select a Buyer</label>
                            <div>
                                <select id="select_a_buyer" class="md-form-control">
                                    <option disabled selected value> -- select an option --</option>
                                    @foreach($buyers as $buyer)
                                        <option value="{{ $buyer["buyer_id"] }}">{{ $buyer["buyer_name"] }}</option>
                                    @endforeach
                                </select>
                                <label class="md-control-label"></label>
                            </div>
                        </div>
                        <div class="md-form-group">
                            <label class="control-label" for="select_a_bank">Select a Bank</label>
                            <div>
                                <select id="select_a_bank" class="md-form-control">
                                    <option disabled selected value> -- select an option --</option>
                                    @foreach($banks as $bank)
                                        <option value="{{ $bank["bank_id"] }}">{{ $bank["bank_name"] }}
                                            ,{{ $bank["branch"] }}</option>
                                    @endforeach
                                </select>
                                <label class="md-control-label"></label>
                            </div>
                        </div>
                        <div class="md-form-group">
                            <label for="overdue_interest">Overdue Interest</label>
                            <input id="overdue_interest" class="md-form-control" type="text" required>
                            <label class="md-control-label"></label>
                        </div>
                        <div class="md-form-group">
                            <label for="payment_period">Payment Period</label>
                            <input id="payment_period" class="md-form-control" type="text">
                            <label class="md-control-label"></label>
                        </div>
                        <div class="md-form-group">
                            <label for="special_instruction">Special Instruction</label>
                            <textarea id="special_instruction" class="md-form-control" type="text"></textarea>
                            <label class="md-control-label"></label>
                        </div>
                        <div id="PItablediv">
                            <table id="PITable" border = "1" style="margin-left: -300px; margin-bottom: 10px;width: 100% ">
                                <thead>
                                <td><h5>SL</h5></td>
                                <td><h5>Description</h5></td>
                                <td><h5>Quantity</h5></td>
                                <td><h5>Unit Price</h5></td>
                                <td><h5>Delete?</h5></td>
                                <td><h5>Add Rows?</h5></td>
                                </thead>
                                <tr>
                                    <td><input size=25 type="text" name="myinput" id="sl" value="1"/></td>
                                    <td><input size=25 type="text" name="myinput" id = "description" class="description"/></td>
                                    <td><input size=25 type="text" name="myinput" id="lngbox"/></td>
                                    <td><input size=25 type="text" name="myinput" class = "unit_price" id = "unit_price"></td>
                                    <td><input type="button" id="delPOIbutton" value="Delete"
                                               onclick="deleteRow(this)"/></td>
                                    <td><input type="button" id="addmorePOIbutton" value="Add More POIs"
                                               onclick="insRow()"/></td>
                                </tr>
                            </table>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit" id="save_pi">Save</button>
                        <button class="btn btn-primary btn-block" type="submit">Reset</button>
                        <button class="btn btn-primary btn-block" type="submit" id="show_pdf">Show PDF</button>
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
    $("#revision").click(function(){
        var pi_id = document.getElementById('pi_id').value;
        $.ajax({
            type: "GET",
            cache: false,
            data: {pi_id: pi_id},
            url: "{{ route('count_pi') }}",
            success: function(data){
               document.getElementById('revision').value = data;
            }
        })
    });
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
        })
    } );

    $("#PITable").on( 'click', '.unit_price', function() {
        var goods_name = $(this).closest('tr').find("#description").val();

        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ route('get_price') }}",
            data:{name:goods_name},
            success: function (data) {
                for(i=0;i<data.length;i++){
                    var price = data[i].unit_price;

                }
                setValue(price);



            }

        });
        function setValue(price) {
            unit_price = price;
        }
        $(this).closest('tr').find("#unit_price").val(unit_price);
        unit_price ="";
        price = "";
        // $(this).closest('tr').find("#unit_price").val(price);


    });
    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        document.getElementById('PITable').deleteRow(i);
    }

    function insRow() {
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

    $('#save_pi').click(function () {
        var rowdata = new Array();
        $('#PITable tr').each(function (row, tr) {

            if (row > 0) {
                var rowIndex = row - 1;
                rowdata[rowIndex] = {
                    "sl": $(tr).find("td:eq(0) input[type='text']").val()
                    , "description": $(tr).find("td:eq(1) input[type='text']").val()
                    , "quantity": $(tr).find("td:eq(2) input[type='text']").val()
                    , "unit_price": $(tr).find("td:eq(3) input[type='text']").val()
                };

                // Another test
            }
        });
        var pi = document.getElementById('pi_id').value;
        var pi_id = pi;
        var revision = document.getElementById('revision').value;
        if(revision != 0){
            pi_id = pi_id+"(rev "+revision+")";
        }
        var offer_validity = new Date(document.getElementById('offer_validity').value);
        var month = offer_validity.getMonth()+1;
        var offer_date = (offer_validity.getFullYear() + '-' + month + '-' + offer_validity.getDate());
        var buyer = $("#select_a_buyer option:selected").val();
        var bank = $("#select_a_bank option:selected").val();
        var overdue_interest = document.getElementById('overdue_interest').value;
        var special_instruction = document.getElementById("special_instruction").value;
        var payment_period = document.getElementById('payment_period').value;
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{ route('doinsertgoods') }}",
            data: {
                rowdata: rowdata,
                pi_id: pi_id,
                offer_validity: offer_date,
                bank: bank,
                buyer: buyer,
                specai_instruction: special_instruction,
                overdue_interest: overdue_interest,
                payment_period: payment_period
            },
            success: function (data) {
                alert("PI saved");
            },
            error: function () {
                alert("Error");
            }
        });
    });
    $('#show_pdf').click(function () {
        var TableData = new Array();
        var pi_id = document.getElementById('pi_id').value;
        var revision = document.getElementById('revision').value;
        if(revision!=0){
            pi_id = pi_id+"(rev "+revision+")";
        }
        var offer_validity = new Date(document.getElementById('offer_validity').value);
        var month = offer_validity.getMonth()+1;
        var offer_date = offer_validity.getFullYear() + '-' + month + '-' + offer_validity.getDate();
        var buyer = $("#select_a_buyer option:selected").val();
        var bank = $("#select_a_bank option:selected").val();
        var overdue_interest = document.getElementById('overdue_interest').value;
        var payment_period = document.getElementById('payment_period').value;
        $('#PITable tr').each(function (row, tr) {
            if (row > 0) {
                var rowIndex = row - 1;
                TableData[rowIndex] = {
                    "sl": $(tr).find("td:eq(0) input[type='text']").val()
                    , "description": $(tr).find("td:eq(1) input[type='text']").val()
                    , "quantity": $(tr).find("td:eq(2) input[type='text']").val()
                    , "unit_price": $(tr).find("td:eq(3) input[type='text']").val()
                }
            }
        });
        $.ajax({

            type: "GET",
            cache: false,
            url: "{{ route('pi_data_global') }}",
            data: {
                pi_id: pi_id,
                revision: revision,
                offer_date: offer_date,
                buyer: buyer,
                bank: bank,
                overdue_interest: overdue_interest,
                payment_period: payment_period,
                goods: TableData
            },
            success: function (data) {

                window.location = "http://localhost:8000/generate_pi_pdf?pdf_values=" + data;

            },
            error: function () {
                alert("error Occured");
            }
        });


    });
    $("#pi_id").click(function(){
       $.ajax({
          type: "GET",
           cache: false,
           url: "{{ route('get_pi_sl') }}",
           success: function(data){
               document.getElementById("pi_id").value = data;

           },
           error: function () {

           }
       });
    });
    $('.datepicker').datepicker({
        format: 'Y/mm/dd',
        startDate: '-3d'
    });
</script>
</body>

<!-- Mirrored from demo.naksoid.com/elephant/materialistic-blue/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Nov 2016 21:25:40 GMT -->
</html>