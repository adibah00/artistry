<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistry</title>
    <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <x-app-layout>
        <!-- This is the header content -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Listing') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-x-auto shadow-xl sm:rounded-lg">
                    <div >
                        <table class="w-full min-w-full text-sm text-left rtl:text-right text-white dark:text-gray-400  0 rounded-lg overflow-hidden">
                            <thead class="text-xs uppercase dark:text-white dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Product Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Product ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Brand
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Origin
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Manage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($products->isEmpty())
                                    <tr>
                                        <td colspan="8" class="border px-6 py-4 text-center font-medium text-gray-500 dark:text-gray-400">
                                            No data available
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($products as $product)
                                        <tr class="border bg-white dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <th scope="row" class="text-center">
                                                {{ $product->name }}
                                            </th>
                                            <td class="px-6 py-4 text-center">
                                                {{ $product->productID }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $product->brand }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" class="w-16 h-16 object-cover rounded">
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $product->category }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $product->price }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $product->origin }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="{{ route('product.edit', ['product' => $product])}}" class="text-blue-500 hover:underline">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-blue-500 hover:underline">
                                                        <i class="material-icons" style="color:red;">delete</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
