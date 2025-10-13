
<x-layout>
    <x-slot name="title">Edit blog page</x-slot>

    <x-slot name="main">
        <h1 class="my-2">Edit blog page</h1>
        <div class="container my-2">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('editlist', $editblog->id) }}" method="post" class="mx-auto my-auto" enctype="multipart/form-data">

                @csrf       
                @method('put')

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="input blog title" name="title" value="{{ $editblog->title }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                        placeholder="Enter a blog description">{{ $editblog->description }}</textarea>
                </div>

                 <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input class="form-control" type="file" id="file" name="file">
                    @if ($editblog->file)
                        <p class="mt-2">Current file: {{ $editblog->file }}</p>
                        <img src="{{ asset('blog_images/' . $editblog->file) }}" alt="Current Image" width="150">
                    @endif
                </div>
                <button class="btn btn-outline-info">submit</button>
            </form>

        </div>

    </x-slot>


</x-layout>
