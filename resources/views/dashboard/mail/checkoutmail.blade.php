<div>
    <h2>Product : {{ $product->name }}</h2>
    <h4>Price : {{ $product->price }}</h4>
    <p>{{ $product->description }}</p>
    <a href="{{ url('product/' . $product->id) }}"></a>
</div>
