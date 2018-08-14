<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Plugin Stylesheets first to ease overrides -->
    <link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/custom-plugins/picklist/picklist.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/select2/select2.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/ibutton/jquery.ibutton.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/cleditor/jquery.cleditor.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/css/page.css" media="screen">

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

    <link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

    <!-- Demo Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">

    <!-- jQuery-UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

    <!-- Theme Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">

    <title>MWS Admin - Form Elements</title>

</head>

<body>

<!-- Themer (Remove if not needed) -->
<div id="mws-themer">
    <div id="mws-themer-content">
        <div id="mws-themer-ribbon"></div>
        <div id="mws-themer-toggle">
            <i class="icon-bended-arrow-left"></i>
            <i class="icon-bended-arrow-right"></i>
        </div>
        <div id="mws-theme-presets-container" class="mws-themer-section">
            <label for="mws-theme-presets">Color Presets</label>
        </div>
        <div class="mws-themer-separator"></div>
        <div id="mws-theme-pattern-container" class="mws-themer-section">
            <label for="mws-theme-patterns">Background</label>
        </div>
        <div class="mws-themer-separator"></div>
        <div class="mws-themer-section">
            <ul>
                <li class="clearfix"><span>Base Color</span>
                    <div id="mws-base-cp" class="mws-cp-trigger"></div>
                </li>
                <li class="clearfix"><span>Highlight Color</span>
                    <div id="mws-highlight-cp" class="mws-cp-trigger"></div>
                </li>
                <li class="clearfix"><span>Text Color</span>
                    <div id="mws-text-cp" class="mws-cp-trigger"></div>
                </li>
                <li class="clearfix"><span>Text Glow Color</span>
                    <div id="mws-textglow-cp" class="mws-cp-trigger"></div>
                </li>
                <li class="clearfix"><span>Text Glow Opacity</span>
                    <div id="mws-textglow-op"></div>
                </li>
            </ul>
        </div>
        <div class="mws-themer-separator"></div>
        <div class="mws-themer-section">
            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
        </div>
    </div>
    <div id="mws-themer-css-dialog">
        <form class="mws-form">
            <div class="mws-form-row">
                <div class="mws-form-item">
                    <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Themer End -->

<!-- Header -->
<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="/admin/images/mws-logo.png" alt="mws admin">
        </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">

        <!-- Notifications -->
        <div id="mws-user-notif" class="mws-dropdown-menu">


            <!-- Notifications dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-notifications">
                        <li class="read">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="#">View All Notifications</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div id="mws-user-message" class="mws-dropdown-menu">


            <!-- Messages dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-messages">
                        <li class="read">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="#">View All Messages</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">

            <!-- User Photo -->
            <div id="mws-user-photo">
                <img src="/admin/example/profile.jpg" alt="User Photo">
            </div>

            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username">
                    Hello, John Doe
                </div>
                <ul>

                    <li><a href="#">更改密码</a></li>
                    <li><a href="index.html">登陆</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Main Wrapper -->
<div id="mws-wrapper">

    <!-- Necessary markup, do not remove -->
    <div id="mws-sidebar-stitch"></div>
    <div id="mws-sidebar-bg"></div>

    <!-- Sidebar Wrapper -->
    <div id="mws-sidebar">

        <!-- Hidden Nav Collapse Button -->
        <div id="mws-nav-collapse">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Searchbox -->
        <div id="mws-searchbox" class="mws-inset">
            <form action="typography.html">
                <input type="text" class="mws-search-input" placeholder="Search...">
                <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
            </form>
        </div>

        <!-- Main Navigation -->
        <div id="mws-navigation">
            <ul>

                <li class="active">
                    <a href="#"><i class="icon-add-contact"></i>用户管理</a>
                    <ul class='closed'>
                        <li class="icon-add-contact"><a href="/admin/user/create">添加用户</a></li>
                        <li><a href="/admin/user">浏览用户</a></li>

                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="icon-archive"></i>类别管理</a>
                    <ul class='closed'>
                        <li class="icon-add-contact"><a href="/admin/cate/create">添加类别</a></li>
                        <li><a href="/admin/cate">浏览类别</a></li>

                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="icon-edit"></i>文章管理</a>
                    <ul class='closed'>
                        <li><a href="/admin/good/create">添加文章</a></li>
                        <li><a href="/admin/good">浏览文章</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i  class="icon-comments"></i>评论管理</a>
                    <ul class='closed'>
                        <li class="icon-add-contact"><a href="/admin/comment/create">添加评论</a></li>
                        <li><a href="/admin/comment">浏览评论</a></li>

                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="icon-picture"></i>轮番图管理</a>
                    <ul class='closed'>
                        <li class="icon-add-contact"><a href="/admin/image/create">添加轮番图</a></li>
                        <li><a href="/admin/image">浏览轮番图</a></li>

                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="icon-link"></i>友情链接管理</a>
                    <ul class='closed'>
                        <li><a href="/admin/link/create">添加友情链接</a></li>
                        <li><a href="/admin/link">浏览友情链接</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="icon-trash"></i>回收站</a>
                    <ul class='closed'>
                        <li><a href="/admin/recycle/index">回收列表</a></li>
                        <li><a href="/admin/recycle"></a></li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>

    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">

        <!-- 内容开始 -->
        <div class="container">
            @section('container')
                @if(session('success'))
                    <div class="mws-form-message success">
                        {{ session('success') }};
                    </div>
                @endif


                @if(session('error'))
                    <div class="mws-form-message success">
                        {{ session('error') }};
                    </div>
                @endif

            @show

        </div>
        <!-- 内容结束 -->

        <!-- Footer -->
        <div id="mws-footer">
            Copyright Your Website 2012. All Rights Reserved.
        </div>

    </div>
    <!-- Main Container End -->

</div>

<!-- JavaScript Plugins -->
<script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
<script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
<script src="/admin/js/libs/jquery.placeholder.min.js"></script>
<script src="/admin/custom-plugins/fileinput.js"></script>

<!-- jQuery-UI Dependent Scripts -->
<script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
<script src="/admin/jui/jquery-ui.custom.min.js"></script>
<script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

<script src="/admin/jui/js/globalize/globalize.js"></script>
<script src="/admin/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

<!-- Plugin Scripts -->
<script src="/admin/custom-plugins/picklist/picklist.min.js"></script>
<script src="/admin/plugins/autosize/jquery.au/admin/tosize.min.js"></script>
<script src="/admin/plugins/select2/select2.min.js"></script>
<script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
<script src="/admin/plugins/validate/jquery.validate-min.js"></script>
<script src="/admin/plugins/ibutton/jquery.ibutton.min.js"></script>
<script src="/admin/plugins/cleditor/jquery.cleditor.min.js"></script>
<script src="/admin/plugins/cleditor/jquery.cleditor.table.min.js"></script>
<script src="/admin/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
<script src="/admin/plugins/cleditor/jquery.cleditor.icon.min.js"></script>

<!-- Core Script -->
<script src="/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/admin/js/core/mws.js"></script>

<!-- Themer Script (Remove if not needed) -->
<script src="/admin/js/core/themer.js"></script>

<!-- Demo Scripts (remove if not needed) -->
<script src="/admin/js/demo/demo.formelements.js"></script>

</body>
</html>
<script type="text/javascript">
    $('.mws-form-message').slideUp(3000);
</script>
