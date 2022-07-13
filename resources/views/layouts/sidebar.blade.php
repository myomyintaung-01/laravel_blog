<div class="list-group mb-3">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('test') }}" class="list-group-item list-group-item-action">Test</a>
    <a href="{{ route('photos.index') }}" class="list-group-item list-group-item-action">Gallery</a>
</div>

<p class="text-black-50 mb-1 ">Manage Post</p>
<div class="list-group mb-3">
    <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">Post List</a>
    <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action">Post Create</a>
</div>

<p class="text-black-50 mb-1 ">Manage Category</p>
<div class="list-group mb-3">
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">Category List</a>
    <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action">Category Create</a>
</div>
@if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
    <p class="text-black-50 mb-1 ">Manage User</p>
    <div class="list-group mb-3">
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">User List</a>
    </div>
@endif

