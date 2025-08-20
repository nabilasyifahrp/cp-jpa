<footer class="py-11 position-relative"
    style="background: linear-gradient(to right, #3461FF, #2241b0); padding-top: 130px;">
    <div class="shape-1"
        style="
    position: absolute;
    top: -1px;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    z-index: 1;">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="display: block; width: 100%; height: 100px;">
            <path d="M0.00,49.98 C150.00,150.00 271.49,-50.00 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                style="stroke: none; fill: #fdfdfd;"></path>
        </svg>
    </div>


    <div class="container mt-7">
        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4 me-auto mb-6 mb-lg-0">
                <div class="d-flex align-items-center mb-3">
                    <a class="footer-logo mb-0" href="{{ route('home.jpa') }}"
                        style="font-size: 23px; line-height: 1; color: #6ceeff; display: flex; align-items: center;">
                        <span class="fw-bold" style="color: #6ceeff;">Jakarta Process Automation</span>
                    </a>
                </div>
                <p style="font-size: 14px; margin-top: 10px; color: #fdfdfd">
                    Jl. Rawamangun Muka Raya 1A Jakarta 13220. <br><br><br>
                    Jl. Asam Sari II, Kp Babakan No. 2 Mustika Jaya <br>- Mustika Sari Bekasi Timur - 17157.
                </p>
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row -flex">
                    <div class="col-12 col-sm-4 navbar-dark">
                        <h5 class="mb-4 fw-bold" style="color: #6ceeff;">Pages</h5>
                        <ul class="navbar-nav list-unstyled mb-0">
                            <li class="mb-0 nav-item fw-semibold"><a class="nav-link" href="#about">About</a></li>
                            <li class="mb-0 nav-item fw-semibold"><a class="nav-link"
                                    href="#service">Service</a></li>
                            <li class="mb-0 nav-item fw-semibold"><a class="nav-link" href="#">Product</a>
                            </li>
                            <li class="mb-0 nav-item fw-semibold"><a class="nav-link" href="#partner">Partner</a>
                            </li>
                            <li class="mb-4 nav-item fw-semibold"><a class="nav-link" href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row text-start mt-8" style="color: #fdfdfd">
                <div class="col-12">
                    <hr class="mb-8 border-2">
                    <p class="mb-3" style="font-size: 12px;">© {{ date('Y') }} PT. Jakarta Process Automation -
                        Automation System Integrator. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollTopBtn = document.getElementById("scrollTopBtn");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 200) {
                scrollTopBtn.style.opacity = "1";
                scrollTopBtn.style.pointerEvents = "auto";
                scrollTopBtn.style.transform = "scale(1)";
            } else {
                scrollTopBtn.style.opacity = "0";
                scrollTopBtn.style.pointerEvents = "none";
                scrollTopBtn.style.transform = "scale(0.9)";
            }
        });

        scrollTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
