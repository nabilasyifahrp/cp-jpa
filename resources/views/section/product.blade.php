<style>
    section {
        margin-bottom: -1px;
        padding-top: 80px;
        background-color: #fdfdfd;
    }

    .product-title {
        font-weight: bold;
        text-align: center;
        margin-bottom: 12.8px;
    }

    .product-subtitle {
        text-align: center;
        color: #666;
        font-size: 15.2px;
        margin-bottom: 22px;
    }

    .category-nav {
        margin-bottom: 20px;
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 6px;
        border-bottom: none;
    }

    .category-nav::-webkit-scrollbar {
        height: 6px;
    }

    .category-nav::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    .category-nav::-webkit-scrollbar-thumb {
        background: #cfe0ff;
        border-radius: 10px;
    }

    .category-btn {
        background-color: transparent;
        border: 2px solid #004ecd;
        color: #004ecd;
        padding: 8px 18px;
        margin: 0 6px;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.22s ease;
        white-space: nowrap;
        display: inline-block;
    }

    .category-btn:hover {
        background-color: rgba(0, 78, 205, 0.08);
        color: #004ecd;
    }

    .category-btn.active {
        background-color: #004ecd;
        color: #fff;
        box-shadow: 0 4px 12px rgba(0, 78, 205, 0.12);
        border-color: #004ecd;
    }

    .product-card {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        margin-bottom: 22px;
        overflow: hidden;
        padding-bottom: 18px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0, 78, 205, 0.12);
    }

    .product-image {
        width: 100%;
        aspect-ratio: 4/3;
        object-fit: contain;
        background-color: #f9f9f9;
    }

    .product-content {
        padding: 14px 18px;
        width: 100%;
    }

    .product-card-title {
        font-weight: 700;
        color: #222;
        margin-bottom: 8px;
        font-size: 16px;
    }

    .product-description {
        color: #6c757d;
        font-size: 13.5px;
        line-height: 1.5;
        margin-bottom: 6px;
    }

    .read-more-btn {
        display: none;
    }

    .product-item {
        display: flex;
        justify-content: center;
    }

    .product-wrapper {
        max-width: 340px;
        width: 100%;
    }

    @media (max-width: 992px) {
        .product-wrapper {
            max-width: 100%;
        }
    }
</style>

<section id="product" class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h3 class="product-title"><span class="section-title">Our Products</span></h3>
            <p class="product-subtitle">Industrial automation and PLC solutions for efficient manufacturing.</p>
        </div>

        <div class="category-nav text-center">
            @foreach ($categories as $cat)
            <button class="category-btn" data-category="cat{{ $cat->id }}">{{ $cat->name }}</button>
            @endforeach
        </div>

        <div class="row g-4" id="products-container">
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 product-item" data-category="cat{{ $product->category_id }}">
                <div class="product-wrapper">
                    <div class="product-card">
                        <img
                            src="{{ $product->image ? asset('storage/'.$product->image) : asset('assets/images/placeholder.png') }}"
                            alt="{{ $product->title }}"
                            class="product-image">
                        <div class="product-content">
                            <h5 class="product-card-title">{{ $product->title }}</h5>
                            <p class="product-description">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const productItems = document.querySelectorAll('.product-item');

        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const selectedCategory = this.getAttribute('data-category');

                productItems.forEach(item => {
                    const matches = (selectedCategory === 'all') || (item.getAttribute('data-category') === selectedCategory);
                    item.style.display = matches ? 'block' : 'none';

                    if (matches) {
                        item.style.opacity = 0;
                        setTimeout(() => item.style.opacity = 1, 80);
                    }
                });
            });
        });
    });
</script>