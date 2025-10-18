<x-layout>
    <x-slot name='title'>
        Blog List

    </x-slot>
    <x-slot name='main'>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif



        <div>
            <a href="{{ route('blog') }}" class="btn btn-outline-info my-2"><i class="fa-solid fa-plus"></i></a>
        </div>

        <table class="table table-striped-columns table-dark my-2 table-hover">
            <tr>
                <td>title</td>
                <td>description</td>
                <td>file</td>
                <td>created_at</td>

            </tr>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td> <img src="{{ asset('blog_images/' . $blog->file) }}"
                            class="img-fluid card-img-top img-thumbnail " alt="Blog Image "
                            style="max-width: 250px; height: auto;">

                    </td>
                    <td>
                        <a href="{{ url('admin/delete/' . $blog->id) }}" class="btn btn-outline-danger"
                            onclick="return confirmDelete(event, this)">
                            <i class="fa-solid fa-trash"></i>
                        </a>


                        <a href="{{ url('admin/edit/' . $blog->id) }}" class="btn btn-outline-warning my-2"
                            onclick="delete()"><i class="fa-solid fa-pen-to-square"></i></a>



                    </td>

                </tr>
            @endforeach
        </table>

        <script>
            function confirmDelete(event, element) {
                event.preventDefault(); // Prevent immediate navigation

                if (confirm("Are you sure you want to delete this blog?")) {
                    // If confirmed, proceed with redirect
                    window.location.href = element.href;
                }
            }
        </script>

    </x-slot>
</x-layout>
