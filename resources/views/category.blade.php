@extends('layout.app')
@section('section')
    <x-page-header title="Shop" />

    <main>
        <div class="container">
            <div class="row">
                <div class="sidebar col-xl-3 col-lg-4">
                    <div class="block">
                        <form method="GET" action="{{ route('category') }}">
                            <h6 class="text-uppercase">Product Categories</h6>
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('category', array_merge(request()->query(), ['category' => $category->id, 'collection' => null, 'page' => null])) }}"
                                            class="d-flex justify-content-between align-items-center {{ request('category') == $category->id && !request('collection') ? 'text-primary font-weight-bold' : '' }}">
                                            <span>{{ $category->name }}</span>
                                            <small>{{ $category->products_count }}</small></a>
                                        @if($category->collections->count())
                                            <ul class="list-unstyled ms-3">
                                                @foreach($category->collections as $collection)
                                                    <li>
                                                        <a class="{{ request('collection') == $collection->id ? 'text-primary font-weight-bold' : '' }}"
                                                            href="{{ route('category', array_merge(request()->query(), ['category' => $category->id, 'collection' => $collection->id, 'page' => null])) }}">{{ $collection->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <h6 class="text-uppercase">Sort By</h6>
                            <select name="sort" class="form-control mb-3" style="height:50px;">
                                <option value="">Newest</option>
                                <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}> Low Price </option>
                                <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}> High Price </option>
                            </select>
                            <hr>
                            <h6 class="text-uppercase">Filter By Price</h6>
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min"
                                class="form-control mb-2">
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max"
                                class="form-control mb-2">
                            @if(!isset($search))
                                <hr>

                                <h6 class="text-uppercase">Brands</h6>
                                @foreach($brands as $brand)
                                    <div class="form-group mb-1">
                                        <input type="checkbox" id="brand{{ $brand->id }}" name="brands[]" value="{{ $brand->id }}"
                                            {{ in_array($brand->id, (array) request('brands', [])) ? 'checked' : '' }}>
                                        <label for="brand{{ $brand->id }}"> {{ $brand->brand }}
                                        </label>
                                    </div>
                                @endforeach
                                <hr>
                            @endif
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('collection'))
                                <input type="hidden" name="collection" value="{{ request('collection') }}">
                            @endif
                            <button type="submit" class="btn btn-sm btn-dark w-100 mt-3"> Apply Filters </button>
                        </form>
                    </div>
                </div>
                <div class="products-grid col-xl-9 col-lg-8">
                    <header class="d-flex justify-content-between align-items-center mb-3">
                        <span>Showing <strong>{{ $products->firstItem() }}</strong> -
                            <strong>{{ $products->lastItem() }}</strong> of <strong>{{ $products->total() }}</strong></span>
                    </header>
                    @if(isset($search))
                        <div class="col-12 mb-4">
                            <h4>
                                Search Results for:
                                <strong>"{{ $search }}"</strong>
                            </h4>
                        </div>
                    @endif
                    <div class="row">
                        @forelse($products as $product)
                            <div class="item col-xl-4 col-md-6">
                                <div class="product is-gray">
                                    <div class="image d-flex align-items-center justify-content-center">
                                        @if($product->badge)
                                            <div class="ribbon ribbon-primary text-uppercase">
                                                {{ $product->badge }}
                                            </div>
                                        @endif
                                        <img src="{{ asset($product->image_url ?? 'img/shirt.png') }}" class="img-fluid"
                                            alt="{{ $product->name }}">
                                        <div class="hover-overlay d-flex align-items-center justify-content-center">
                                            <div class="CTA d-flex align-items-center justify-content-center">
                                                <form method="POST" action="{{ route('cart.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                </form>
                                                <a href="{{ route('product.show', $product->id) }}"
                                                    class="visit-product active"><i class="icon-search"></i> View</a>
                                                <a href="#" data-toggle="modal" data-target="#modal{{ $product->id }}"> <i
                                                        class="fa fa-arrows-alt"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <small class="text-muted"> {{ $product->collection->category->name ?? 'No Category' }}
                                        </small>
                                        <h3 class="h6 text-uppercase"> {{ $product->name }} </h3>
                                        <span class="price text-muted"> ${{ $product->base_price }} </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning">
                                    No products found
                                </div>
                            </div>
                        @endforelse
                    </div>
                    @if ($products->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                @if ($products->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">« Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}">« Previous</a>
                                    </li>
                                @endif
                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                @if ($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next »</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next »</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </main>
    @foreach($products as $product)
        <div id="modal{{ $product->id }}" class="modal fade overview" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal"> <span><i class="icon-close"></i></span> </button>
                    <div class="modal-body">
                        <div class="row d-flex align-items-center">
                            <div class="image col-lg-5">
                                <img src="{{ asset($product->image_url ?? 'img/shirt.png') }}" class="img-fluid">
                            </div>
                            <div class="details col-lg-7">
                                <h2>{{ $product->name }}</h2>
                                <ul class="price list-inline">
                                    <li class="list-inline-item current">
                                        ${{ $product->base_price }}
                                    </li>
                                </ul>
                                <p>{{ $product->description }}</p>
                                <form method="POST" action="{{ route('cart.add') }}" class="d-flex align-items-center flex-wrap">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    
                                    <div class="d-inline-flex align-items-center mr-3 mb-2">
                                        <span class="mr-3" style="font-weight: 600; color: #555;">Quantity</span>
                                        <div class="quantity-selector d-inline-flex align-items-center" style="border: 1.5px solid #E0E0E0; border-radius: 25px; padding: 2px 6px; background: #fff; transition: border-color 0.2s; height: 38px; box-sizing: border-box;" onmouseover="this.style.borderColor='#9055A2'" onmouseout="this.style.borderColor='#E0E0E0'">
                                            <button type="button" class="border-0 bg-transparent" style="cursor: pointer; padding: 0 10px; font-weight: bold; color: #666; font-size: 1.2em; outline: none; line-height: 1;" onmouseover="this.style.color='#9055A2'" onmouseout="this.style.color='#666'" onclick="let input = this.parentNode.querySelector('input[type=number]'); if (input.value > 1) { input.value = parseInt(input.value) - 1; }">-</button>
                                            <input type="number" name="quantity" value="{{ old('product_id') == $product->id ? old('quantity') : 1 }}" min="1" max="100" readonly style="width: 35px; border: 0; text-align: center; font-weight: 700; color: #333; font-size: 1.05em; outline: none; background: transparent; -moz-appearance: textfield; pointer-events: none;">
                                            <style>
                                                input[type=number]::-webkit-inner-spin-button, 
                                                input[type=number]::-webkit-outer-spin-button { 
                                                    -webkit-appearance: none; 
                                                    margin: 0; 
                                                }
                                            </style>
                                            <button type="button" class="border-0 bg-transparent" style="cursor: pointer; padding: 0 10px; font-weight: bold; color: #666; font-size: 1.2em; outline: none; line-height: 1;" onmouseover="this.style.color='#9055A2'" onmouseout="this.style.color='#666'" onclick="let input = this.parentNode.querySelector('input[type=number]'); if (input.value < 100) { input.value = parseInt(input.value) + 1; }">+</button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-template mb-2" style="border-radius: 25px; padding: 6px 25px; height: 38px; line-height: 1; display: inline-flex; align-items: center; justify-content: center; font-weight: 600;">Add to Cart</button>
                                </form>
                                @if($errors->any() && old('product_id') == $product->id)
                                    <div class="alert alert-danger mt-2" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: 10px; border-radius: 5px; font-size: 14px;">
                                        @foreach($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if($errors->any() && old('product_id'))
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                const checkjQuery = setInterval(function() {
                    if (window.jQuery) {
                        clearInterval(checkjQuery);
                        jQuery('#modal{{ old('product_id') }}').modal('show');
                    }
                }, 50);
            });
        </script>
    @endif
@endsection