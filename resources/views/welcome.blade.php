


<x-layout>
    <x-slot name="title">Welcome</x-slot>
<x-slot name="main">

    @if(session('success'))
<div class="alert alert-success" role="alert">
{{ session('success') }}</div>
@endif

<h1>welcome</h1>    

</x-slot>
</x-layout>



