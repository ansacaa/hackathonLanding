@extends('layouts.master')

@section('content')
    @include('sections.hero')
    
    <div class="main">
        @include('sections.sponsors')

        @include('sections.howto')       
        
        @include('sections.intro')
    
        @include('sections.about')
    
        @include('sections.location')
    
        @include('sections.experience')
    </div>
@endsection