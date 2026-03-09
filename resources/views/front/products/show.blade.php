@extends('layouts.app')

@section('content')

<style>
.inquiry-btn{
    display:inline-block;
    background:#facc15;
    color:#111;
    padding:12px 20px;
    border-radius:25px;
    text-decoration:none;
    font-weight:bold;
}

.related-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:20px;
}

.related-card{
    background:#fff;
    border-radius:12px;
    padding:15px;
    box-shadow:0 10px 20px rgba(0,0,0,.05);
}
</style>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

    <!-- IMAGE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <img
            src="{{ $image }}"
            class="w-full h-[420px] object-cover"
            alt="Product image"
        >
    </div>

    <!-- INFO -->
    <div>

        <span class="inline-block mb-2 px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full">
            {{ ucfirst($category) }}
        </span>

        <h1 class="text-3xl font-extrabold mb-4">
            {{ $name }}
        </h1>

        <p class="text-gray-600 mb-6 leading-relaxed">
            {{ $desc }}
        </p>

        <div class="text-2xl font-bold mb-6">
            {{ $price }}
        </div>

        <!-- SIZE -->
        <div class="mb-6">
            <p class="font-medium mb-2">Size</p>
            <div class="flex gap-3">
                <button class="px-4 py-2 border rounded-lg hover:bg-black hover:text-white">S</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-black hover:text-white">M</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-black hover:text-white">L</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-black hover:text-white">XL</button>
            </div>
        </div>

        <!-- ACTION -->
        <div class="flex gap-4">

            <a href="/inquiry?product={{ $name }}" class="inquiry-btn">
                Inquiry Product
            </a>

            <a href="/catalog"
               class="px-6 py-3 border rounded-full hover:bg-gray-100 transition">
                Back to Catalog
            </a>

        </div>

    </div>

</div>

<!-- DESCRIPTION -->
<div class="mt-16 bg-white rounded-xl shadow p-8">

    <h2 class="text-xl font-bold mb-4">
        Product Details
    </h2>

    <ul class="list-disc pl-6 space-y-2 text-gray-700">
        <li>Material premium</li>
        <li>Nyaman dipakai seharian</li>
        <li>Potongan streetwear modern</li>
        <li>Cocok untuk casual & urban look</li>
    </ul>

</div>

<!-- RELATED PRODUCTS -->
<div class="mt-16">

<h2 class="text-2xl font-bold mb-6">
Related Products
</h2>

<div class="related-grid">

@foreach($related as $product)

<div class="related-card">

<img
src="{{ $product['image'] }}"
class="w-full h-48 object-cover rounded-lg mb-3"
>

<h3 class="font-bold mb-2">
{{ $product['name'] }}
</h3>

<a
href="/products/{{ $product['slug'] }}"
class="text-yellow-600 font-medium"
>
View Product
</a>

</div>

@endforeach

</div>

</div>

@endsection