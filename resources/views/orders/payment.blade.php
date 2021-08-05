<x-app-layout>
    <div class="container py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase">
                <span class="font-semibold">Número de order:</span> Orden - {{ $order->id }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($order->envio_type == 1)
                        <p class="text-sm">Los productos deben ser recogiodos en la tienda</p>
                        <p class="text-sm">Cra. falsa 123</p>
                    @else
                        <p class="text-sm">Los productos Serán enviados a: </p>
                        <p class="text-sm">{{ $order->address }}</p>
                        <p>{{ $order->department->name }} - {{ $order->city->name }} -
                            {{ $order->district->name }}
                        </p>
                    @endif
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">Daros de contacto</p>
                    <p class="text-sm">Persona que resibirá el producto {{ $order->contact }}</p>
                    <p class="text-sm">telefono de contacto {{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 text-gray-700">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant.</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">
                                            @isset ($item->options->color)
                                                Color: {{__($item->options->color)}}
                                            @endisset

                                            @isset ($item->options->size)
                                                - {{$item->options->size}}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center">
                                {{$item->price}} USD
                            </td>
                            <td class="text-center">
                                {{$item->qty}}
                            </td>
                            <td class="text-center">
                                {{$item->price * $item->qty}} USD
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 flex justify-between items-center">
            <img class="h-8" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
            <div class="text-gray-700">
                <p class="text-sm font-semibold ">
                    Subtotal: {{ $order->total - $order->shipping_cost }} USD
                </p>
                <p class=" text-sm font-semibold ">
                    Envío: {{ $order->shipping_cost }} USD
                </p>
                <p class="text-lg font-semibold ">
                    Total: {{ $order->total }} USD
                </p>
            </div>
        </div>

    </div>
</x-app-layout>
