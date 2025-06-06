<!-- tap to top-->
<div class="tap-top">
    <svg class="feather">
        <use href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-up">
        </use>
    </svg>
</div>
<!-- loader-->
<div class="loader-wrapper">
    <div class="loader"></div>
</div>
<main class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page header start -->
    <header class="page-header row">
        <div class="logo-wrapper d-flex align-items-center col-auto"><a href="index.html"><img class="for-light"
                    src="{{ asset('asset/images/pawly_logo.png') }}" alt="logo"><img class="for-dark"
                    src="../assets/images/logo/dark-logo.png" alt="logo"></a><a class="close-btn"
                href="javascript:void(0)">
                <div class="toggle-sidebar">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </a></div>
        <div class="page-main-header col">
            <div class="header-left d-lg-block d-none">
                <form class="search-form mb-0">
                    <div class="input-group"><span class="input-group-text pe-0">
                            <svg class="search-bg svg-color">
                                <use href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Search">
                                </use>
                            </svg></span>
                        <input class="form-control" type="text" placeholder="Search anything...">
                    </div>
                </form>
            </div>
            <div class="nav-right">
                <ul class="header-right">
                    <li class="profile-dropdown custom-dropdown">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('./public/asset/images/abt_img1.png') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <div class="flex-grow-1 ms-2">
                                <h5>{{ Auth::user()->name }}</h5> <!-- Hiển thị tên người dùng -->
                                <span>{{ Auth::user()->role ?? 'Khách hàng' }}</span> <!-- Hiển thị vai trò nếu có -->
                            </div>
                        </div>

                        <div class="custom-menu overflow-hidden">
                            <ul>
                                <li class="d-flex">
                                    <svg class="svg-color">
                                        <use
                                            href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Profile">
                                        </use>
                                    </svg><a class="ms-2" href="user-profile.html">Tài khoản</a>
                                </li>
                                <li class="d-flex">
                                    <svg class="svg-color">
                                        <use
                                            href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Document">
                                        </use>
                                    </svg><a class="ms-2" href="to-do.html">Task</a>
                                </li>
                                <li class="d-flex">
                                    <svg class="svg-color">
                                        <use
                                            href="https://admin.pixelstrap.net/edmin/assets/svg/iconly-sprite.svg#Login">
                                        </use>
                                    </svg>
                                    <a class="ms-2" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
