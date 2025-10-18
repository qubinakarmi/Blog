<x-layout>
    <x-slot name="title">Welcome</x-slot>
    <x-slot name="main">


        <style>
            {
                color: white;
                margin: 0;
                padding: 0;

            }




            /* animation  */

            .fade-up {
                opacity: 0;
                transform: translateY(30px);
                animation: fadeUp 1.5s ease-out forwards;
            }

            @keyframes fadeUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }


            .py-5 {
                color: gray;
            }


            .py-5:hover {
                color: orangered;
                transition: 5sec;
              
            }

            .container {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }
        </style>
        <div class="container  text-center">
            @if(Route::has('login'))
            @auth
            <h1 class="py-5 fade-up"> Welcome to Home page,{{ Auth::user()->name ?? 'Guest' }}</h1>
            @else
            <h1 class="py-5 fade-up">Welcome please login to visit site</h1>
            @endauth

            @endif

        </div>


        <div>
            <img src="{{ asset('blog_images/1760271287.jpg') }}" alt="" style="width:100%; height:300px;"
                class="mb-3">

        </div><br><br>
        <div>
            <h1 class="mx-3" style="color: rgb(0, 0, 0);">Blog</h1>
            <hr>
            <h2 style="color: gray;" class="mx-2">Discover Blog ,<br><span style="color: orangered;"
                    class="mx-3">see the informative blog here.</span></h2>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis maiores laborum nobis! Ex quam iste
            obcaecati hic laboriosam ut. Dolorum qui unde fugiat laudantium blanditiis voluptates suscipit quibusdam
            quia similique!Lorem
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod facere asperiores vitae ducimus accusantium!
            Maxime officia esse accusantium? Necessitatibus, aperiam sunt aspernatur qui quo animi et dolorem sit totam.
            Ipsum.
        </p>

    </x-slot>
</x-layout>
