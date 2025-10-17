<x-layout>
    <x-slot name="title">Blog page</x-slot>

    <x-slot name="main">
        <div class="container my-2">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('add.blog') }}" method="post" class="mx-auto my-auto" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Input blog title" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                        placeholder="Enter a blog description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">File</label>
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
                <button class="btn btn-outline-info">submit</button>
            </form>

        </div>

    </x-slot>


</x-layout>
