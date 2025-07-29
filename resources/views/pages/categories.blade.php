@extends('layouts.masterLayout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4 text-white">Product Categories</h1>
            <p class="text-center text-white mb-5">Browse our products by category</p>
        </div>
    </div>
    
    <!-- Categories Grid -->
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card category-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Electronics">
                <div class="card-body text-center">
                    <h4 class="card-title">Electronics</h4>
                    <p class="card-text">Latest gadgets, smartphones, laptops and more</p>
                    <a href="#" class="btn btn-primary">Browse Electronics</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card category-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Fashion">
                <div class="card-body text-center">
                    <h4 class="card-title">Fashion</h4>
                    <p class="card-text">Trendy clothing, shoes, and accessories</p>
                    <a href="#" class="btn btn-primary">Browse Fashion</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card category-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Home & Garden">
                <div class="card-body text-center">
                    <h4 class="card-title">Home & Garden</h4>
                    <p class="card-text">Furniture, decor, and gardening supplies</p>
                    <a href="#" class="btn btn-primary">Browse Home & Garden</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card category-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Sports">
                <div class="card-body text-center">
                    <h4 class="card-title">Sports & Fitness</h4>
                    <p class="card-text">Exercise equipment, sportswear, and gear</p>
                    <a href="#" class="btn btn-primary">Browse Sports</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card category-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Books">
                <div class="card-body text-center">
                    <h4 class="card-title">Books & Media</h4>
                    <p class="card-text">Books, movies, music, and educational content</p>
                    <a href="#" class="btn btn-primary">Browse Books</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card category-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Beauty">
                <div class="card-body text-center">
                    <h4 class="card-title">Beauty & Health</h4>
                    <p class="card-text">Skincare, makeup, and wellness products</p>
                    <a href="#" class="btn btn-primary">Browse Beauty</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.category-card {
    transition: transform 0.3s ease-in-out;
    border: none;
}

.category-card:hover {
    transform: translateY(-5px);
}
</style>
@endsection