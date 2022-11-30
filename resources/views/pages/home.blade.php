@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<!-- MISSING DISPLAYING THE CATEGORIES -->
<main>
    <div id="categories" class="mt-4 container">
        <div class="row flex-nowrap overflow-scroll justify-content-between" style="background-color: white">
            @include('partials.category_card', ['category' => 'Smartphones'])
            @include('partials.category_card', ['category' => 'Components'])
            @include('partials.category_card', ['category' => 'TVs'])
            @include('partials.category_card', ['category' => 'Laptops'])
            @include('partials.category_card', ['category' => 'Desktops'])
            @include('partials.category_card', ['category' => 'Other'])
        </div>
    </div>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>New Releases</h2></div>
        <div class="row flex-nowrap overflow-scroll">
            @each('partials.product_card', $newProducts, 'product')
        </div>
    </div>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Best Smartphones</h2></div>
        <div class="row flex-nowrap overflow-scroll">
            @each('partials.product_card', $bestSmartphones, 'product')
        </div>
    </div>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Best Laptops</h2></div>
        <div class="row flex-nowrap overflow-scroll">
            @each('partials.product_card', $bestLaptops, 'product')
        </div>
    </div>
</main>


@endsection