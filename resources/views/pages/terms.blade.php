@extends('layouts.app')
@section('title', $content->meta_title ?: 'meta_title')
@section('description', $content->meta_description ?: 'meta_description')
@section('keywords', $content->meta_keywords ?: 'meta_keywords')
@section('content')
    <!-- ======================= breadcrumb Start  ============================ -->
    <div class="breadcrumb_sec py-3">
        <div class="container">
            <nav>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Terms & Conditions</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- =======================  breadcrumb End  ============================ -->

    <!-- ======================= Custom page Start  ============================ -->
    <div class="custom_section pb-5">
        <div class="container">
            <div class="bg-white rounded p-4 border">
                <div class="page_content">
                    <h1 class="page_title">{{ $content->name ?? 'Not Available' }}</h1>
                    <div class="desc">
                        <p>{{ $content->description ?? 'Not Available' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Custom page End  ============================ -->
@endsection
