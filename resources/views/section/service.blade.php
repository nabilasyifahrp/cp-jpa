<style>
    section {
        margin-bottom: -1px;
        padding-top: 80px;
        background-color: #fdfdfd;
    }

    .service-title {
        font-weight: bold;
        text-align: center;
        margin-bottom: 12.8px;
    }

    .service-subtitle {
        text-align: center;
        color: #666;
        font-size: 15.2px;
        margin-bottom: 80px;
    }

    .card-custom {
        background-color: #3460ff51;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 35px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        transition: all 0.3s ease;
        transform: scale(1);
        font-family: 'Montserrat', sans-serif;

    }

    .card-custom:hover {
        transform: scale(1.05);
    }

    .card-custom h4 {
        font-weight: bold;
        font-size: 19.2px;
        margin-bottom: 15px;
        text-align: center;
    }

    .card-custom .content {
        flex-grow: 1;
        font-size: 14px;
        color: #333;
        text-align: justify;
    }

    .card-custom .content ul {
        padding-left: 19.2px;
        margin-bottom: 16px;
    }

    .card-custom .content ul li {
        margin-bottom: 8px;
    }

    .btn-read {
        background: linear-gradient(to right, #3461FF, #2241b0);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        color: #fdfdfd !important;
        text-align: center;
    }

    .btn-read:hover {
        background: linear-gradient(to right, #0032e8, #0f266e);
    }

    .section-title {
        border-bottom: 3px solid #001f3f;
        display: inline-block;
        padding-bottom: 5px;
    }

    .card-custom .content h1,
    .card-custom .content h2,
    .card-custom .content h3,
    .card-custom .content h4,
    .card-custom .content h5,
    .card-custom .content h6 {
        font-size: inherit;
        font-weight: normal;
        margin: 0;
        padding: 0;
        display: inline;
    }

    @media (max-width: 576px) {
        .card-custom h4 {
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }
    }
</style>
<section id="service" class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h3 class="service-title"><span class="section-title">Our Services</span></h3>
            <p class="service-subtitle">Professional and reliable service.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach ($services as $service)
                <div class="col-md-4 d-flex" data-aos="fade-up" data-aos-duration="900">
                    <div class="card-custom w-100">
                        <h4>{!! \Illuminate\Support\Str::limit($service->title, 25) !!}</h4>
                        <div class="content">
                            {!! \Illuminate\Support\Str::limit($service->description, 220) !!}
                        </div>
                        <a href="{{ route('service.detail', $service->id) }}" class="btn btn-read">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
