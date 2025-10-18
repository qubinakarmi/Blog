<x-layout>
    <x-slot name='title'>Blog page</x-slot>
    <x-slot name='main'>




        <div class="bg-light">
            <div class="container mt-5  ">
                <h2 class="text-center mb-4">Full Post Blogs</h2>

                <div class="row justify-content-center">

                    <div class="col-md-8 mb-8 ">
                        <div class="card shadow-sm">
                            <div class="mx-5 my-3 ">
                                <img src="{{ asset('blog_images/' . $blogs->file) }}" class="card-img-top"
                                    alt="Blog Image" style="width:100%; height:300px;">

                            </div>


                            <div class="card-body">
                                <h5 class="card-title">{{ $blogs->title }}</h5>
                                <p class="card-text">{{ $blogs->description }}</p>
                                <small class="text-muted">Posted on {{ $blogs->created_at->format('d M, Y') }}</small>

                                <div class="comment bg-body-secondary" style=" height:100px;">

                                    <livewire:comments :model="$blogs"/>


                           


                                </div>

                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </x-slot>
</x-layout>
