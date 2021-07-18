<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{Storage::url($image->url)}}">
                                <img src="{{Storage::url($image->url)}}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h1 class="text-x1 font-bold text-trueGray-700">{{$product->name}}</h1>
                <div class="flex">
                    <p class="text-trueGray-700">Marca: <a href="" class="underline capitalize hover:text-orange-500">{{$product->brand->name}}</a></p>
                    <p class="text-trueGray-700 ml-6"> 5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a  href="" class="text-orange-500 underline mx-6 hover:text-orange-700">39 Reseñas</a>
                </div>
                <p class="text-2xl font-semibold text-trueGray-700 my-4">USD {{$product->price}}</p>
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hacen envíos a todo Colombía</p>
                            <p class="">Recibelo el {{ now()->addDay(7)->format('l j F') }}</p>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
