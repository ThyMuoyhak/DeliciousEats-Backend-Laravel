@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Delete Category</h1>

    <div class="bg-white shadow-md rounded p-6 max-w-md">
        <p class="text-gray-700 mb-4">
            Are you sure you want to delete the category <strong>{{ $category->name }}</strong>?
            This will also delete all associated products.
            @if ($category->deleted_at)
                This category is already soft-deleted.
            @else
                This action will soft-delete the category.
            @endif
        </p>

        <form action="{{ route('categories.destroy', $category->cat_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Confirm Delete
            </button>
            <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                Cancel
            </a>
        </form>
    </div>
</div>
@endsection