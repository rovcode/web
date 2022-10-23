@extends('layouts.web')
@section('content')
    @extends('snippets.navBar')
    <div class="container mt-5">
        <a class="text-primary" href="{{ url('home') }}">Dashboard</a> <i class="fa-solid fa-chevron-right"></i> Productos
    </div>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <strong>{{ $message }}</<strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <a class="btn btn-primary" href="{{ route('add_product') }}"><i class="fa-regular fa-square-plus"></i> Registrar
            Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ruta</th>
                    <th scope="col">Tamaño</th>
                    <
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->path }}</td>
                        <td>{{ $file->size }}</td>
                        <td>
                            @foreach ($categories as $category)
                                @if ($category->id == $product->category_id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-2">
                                    <a class="btn btn-primary" href="{{ route('show_product', $product->id) }}"><i
                                            class="fa-solid fa-arrows-to-eye"></i></a>
                                </div>
                                <div class="col-sm-2">
                                    <a class="btn btn-success" href="{{ route('edit_product', $product->id) }}"><i
                                            class="fa-solid fa-repeat"></i></a>
                                </div>
                                <div class="col-sm-2">

                                    <form action="{{ route('delete_product', $product->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"><i
                                                class='fa-solid fa-trash-can'></i><button />

                                    </form>
                                </div>


                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
 