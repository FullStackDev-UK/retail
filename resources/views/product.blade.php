@extends('layouts.app')

@section('content')

    <product-details :product="{{$product}}" :product_images="{{$product_images}}"></product-details>
    
@endsection
