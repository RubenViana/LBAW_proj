@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageProducts</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All products...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">Product id</th> -->
                <th scope="col">Product name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Launch Date</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <script>
                $('button').click(function(e){
                    $(this).closest('tr').remove()
                })
            </script>
            @foreach($allProducts as $product)
                <tr>
                    <!-- <th contenteditable='true' scope="row">{{ $product->id }}</th> -->
                    <th contenteditable='true' scope="row" id="productName">{{ $product->prodname }}</th>
                    <td contenteditable='true' id="productPrice">{{ $product->price }}</td>
                    <td contenteditable='true' id="productStock">{{ $product->stock }}</td>
                    <td contenteditable='true' id="productLaunchDate">{{ $product->launchdate }}</td>
                    <td>
                        <!-- <script>
                            $(document).ready(function() {
                                $('.form-control[name="category_Selector"]').on('change', showSelectedValue);
                                
                                function showSelectedValue(event) {
                                    var target = $(event.target);
                                    console.log(target.val() + " = " + target.find('option:selected').text());
                                }
                            });
                        </script> -->
                        <select class="form-select" id="exampleSelect2" name="category_Selector">
                            <option selected="selected">{{ $product->categoryname }}</option>
                            @foreach($allCategories as $category)
                                @if ($category <> $product->categoryname))
                                    <option>{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td contenteditable='true'>{{ $product->proddescription }}</td>
                    <td>
                        <a href="adminManageProducts/delete/{{ $product->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a" href="adminManageProducts/save/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection