
<x-layout>
    <x-slot name='title'>Blog page</x-slot>
    <x-slot name='main'>


 

<div class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">All Blogs</h2>

        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('blog_images/' . $blog->file) }}" class="card-img-top" alt="Blog Image" style="height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->description }}</p>
                            <small class="text-muted">Posted on {{ $blog->created_at->format('d M, Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($blogs->isEmpty())
            <p class="text-center text-muted">No blogs found.</p>
        @endif
    </div>
</div>
   </x-slot>
</x-layout>