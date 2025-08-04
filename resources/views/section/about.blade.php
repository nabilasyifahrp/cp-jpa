<style>
    .wrapper {
        background: linear-gradient(to right, #3461FF, #2241b0);
        padding-top: 64px;
        padding-bottom: 128px;
        overflow: hidden;
    }

    .nav-tabs {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        border-bottom: none;
        padding-left: 8px;
        gap: 8px;

    }

    .nav-tabs::-webkit-scrollbar {
        display: none;
    }

    .nav-tabs .nav-link {
        color: #fdfdfd;
        background: none;
        border: none;
        padding: 8px 16px;
        white-space: nowrap;
        font-size: 17.6px;
        transition: all 0.3s ease;
        font-family: 'Montserrat', sans-serif;
    }

    .nav-tabs .nav-link:hover,
    .nav-tabs .nav-link.active {
        background-color: #a8e1ff77;
        border-radius: 15px;
    }

    .title {
        display: inline-block;
        border-bottom: 3px solid #001f3f;
        padding-bottom: 5px;
        margin-bottom: 24px;    }

    .about-image {
        background-color: #fdfdfd;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 100%;
        text-align: center;
    }

    .about-image img {
        width: 100%;
        height: auto;
    }

    #tab-title {
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 16px;
    }

    #tab-title span {
        color: #6ceeff;
    }

    #tab-content {
        font-size: 17.6px;
        text-align: justify;
        color: #fdfdfd;
    }

    #tab-title,
    #tab-content {
        transition: opacity 0.4s ease;
    }

    @media (max-width: 768px) {
        .container {
            padding-left: 24px !important;
            padding-right: 24px !important;
        }

        .row.align-items-center {
            flex-direction: column-reverse !important;
            gap: 32px;
        }

        .nav-tabs .nav-link {
            font-size: 13.6px ;
            font-size: 16px;

        }

        #tab-title {
            font-size: 22.4px;
        }

        #tab-content {
            font-size: 15.2px;
        }
    }
</style>

<section id="about" class="position-relative text-white wrapper">

    <div class="container position-relative px-3" style="z-index: 1;">
        <ul class="nav nav-tabs border-0 mb-4">
            <li class="nav-item"><button class="nav-link active" data-tab="Who">Who</button></li>
            <li class="nav-item"><button class="nav-link" data-tab="Vision & Mission">Vision &
                    Mission</button>
            </li>
            <li class="nav-item"><button class="nav-link" data-tab="Values">Values</button></li>
            <li class="nav-item"><button class="nav-link" data-tab="Brand">Brand</button></li>
            <li class="nav-item"><button class="nav-link" data-tab="Application">Application</button>
            </li>
        </ul>

        <div class="row align-items-center flex-md-row flex-column-reverse">
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <h3 id="tab-title" class="title" data-aos="fade-up" data-aos-duration="900">
                    <span style="color: #fdfdfd;">Who </span><span>We Are?</span>
                </h3>
                <p id="tab-content" data-aos="fade-up" data-aos-duration="900">
                    Jakarta Process Automation (JPA) has been engaged in electrical control,
                    instrumentation, and PLC-SCADA programming for more than 9 years. We
                    provide reliable technology-based process automation solutions for
                    various industries.
                </p>
            </div>

            <div class="col-md-6 d-flex justify-content-center justify-content-md-end" data-aos="fade-up"
                data-aos-duration="900">
                <div class="about-image">
                    <img src="assets/images/about/about.png" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 start-0 w-100">
        <svg viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path fill="#ffffff"
                d="M0,60L60,66.7C120,73,240,87,360,93.3C480,100,600,100,720,83.3C840,67,960,33,1080,23.3C1200,13,1320,27,1380,33.3L1440,40L1440,100L1380,100C1320,100,1200,100,1080,100C960,100,840,100,720,100C600,100,480,100,360,100C240,100,120,100,60,100L0,100Z">
            </path>
        </svg>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll(".nav-tabs .nav-link");
        const content = document.getElementById("tab-content");
        const title = document.getElementById("tab-title");

        const tabData = {
            "Who": {
                title: 'Who <span>We Are?</span>',
                content: `Jakarta Process Automation (JPA) has been engaged in electrical control,
        instrumentation, and PLC-SCADA programming for more than 9 years. We
        provide reliable technology-based process automation solutions for
        various industries.`
            },
            "Vision & Mission": {
                title: 'Our <span>Vision & Mission</span>',
                content: `<strong>Vision:</strong> World Class Competence in Automation Services.<br><br>
        <strong>Mission:</strong><br>
        1. High quality production and service<br>
        2. Good compensation for employee and creating nice working environment to get good relation to customer and supplier<br>
        3. Be first and best in creating competence manpower in automation<br>
        4. Make automation part is easy and available`
            },
            "Values": {
                title: 'Our <span>Values</span>',
                content: `1. Expertise<br>2. Responsive<br>3. Trust`
            },
            "Brand": {
                title: 'Our <span>Brands</span>',
                content: `We have various experiences with some brand of PLC and SCADA, such as:<br>
        1. GE<br>2. Schneider<br>3. Allen Bradley<br>4. Siemens`
            },
            "Application": {
                title: 'Our <span>Applications</span>',
                content: `We serve in various process applications. Such as:<br>
        1. Control PW / WFI DI Looping<br>
        2. Control Blending / Mixing<br>
        3. Control Cleaning In Place (CIP)<br>
        4. Control Pasteurizer<br>
        5. Control Water Treatment Plant / Waste Water Treatment Plant<br>
        6. and others`
            }
        };

        tabs.forEach(tab => {
            tab.addEventListener("click", function() {
                tabs.forEach(t => t.classList.remove("active"));
                this.classList.add("active");

                const selected = this.getAttribute("data-tab");


                title.style.opacity = 0;
                content.style.opacity = 0;


                setTimeout(() => {
                    title.innerHTML = tabData[selected].title;
                    content.innerHTML = tabData[selected].content;

                    title.style.opacity = 1;
                    content.style.opacity = 1;
                }, 400);

            });
        });

    });
</script>
