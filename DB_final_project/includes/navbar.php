<header id="" style="height: 105px;">
    <nav class="navbar fixed-top navbar-expand-lg bg-light shadow">
        <div class="container">
            <a class="navbar-brand me-auto" href="#"><img src="image/FCU_IECS.png" class="head-icon"></a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">葉春秀 教授</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="index.php">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="course.php">教授課表</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="course.php#appointment">預約面談</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="projectquota.php">專題名額</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="login_register/login.php" class="login-button" target="_blank">登入</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var path = window.location.pathname;
        var page = path.split("/").pop();

        var links = document.querySelectorAll('.nav-link');
        links.forEach(function(link) {
            if (link.getAttribute('href') === page) {
                link.classList.add('active');
            }
        });
    });
</script>