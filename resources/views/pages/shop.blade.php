@extends('layouts.masterLayout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4 text-white">Our Shop</h1>
            <p class="text-center text-white mb-5">Discover our amazing collection of products</p>
        </div>
    </div>
    
    <!-- Product Grid -->
    <div class="row">
        @for ($i = 1; $i <= 8; $i++)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card product-card h-100 shadow-sm">
                <img src="https://via.placeholder.com/250x200" class="card-img-top" alt="Product {{ $i }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Product {{ $i }}</h5>
                    <p class="card-text text-muted">High quality product with amazing features and great value for money.</p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary mb-0">${{ 29.99 + ($i * 10) }}</span>
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
    
    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item active">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection