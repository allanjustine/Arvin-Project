<div>
    <h1 class="text-center offset-2">Recent Posts</h1>
    <div class="row offset-1 mt-5">
        <div class="row offset-4">
            <select class="select" value="form-select" wire:model.lazy="category">
                <option hidden="true">Category</option>
                <option selected disabled>Category</option>
                <option value="all">All Category</option>
                <option value="drama">Drama</option>
                <option value="action">Action</option>
                <option value="sweet">Sweet</option>
                <option value="comedy">Comedy</option>
                <option value="horror">Horror</option>
            </select><br>
            <input class="mt-1 search" type="text" placeholder="Search" wire:model.lazy="search">
        </div>
            @if (session('message'))
                <div class="alert alert-success mt-5 text-center">{{ session('message') }}</div>
            @endif
    @foreach ($recentPosts as $rp)
        <div class="col-sm-4 mt-5">
            <div class="card rounded shadow-sm {{($rp->user->gender === 'male') ? 'male' : 'female'}}" id="card">
                <div class="card-header"><h5 class="mt-2 categ" style="font-family: sans-serif">{{ $rp->category }} | {{$rp->user->name}}</h5></div>
                <div class="card-body rounded" id="card-body"><p style="font-size: 20px;">{{$rp->remarks}}
                </p></div>
                <div class="card-footer">
                <span class="time">posted at: {{ $rp->created_at->format('g:i A') }}</span><br>
                @role('admin')
                <a class="btn btn-success" href="{{ url('editRecentPost', ['recentPost' => $rp->id]) }}">Update</a>
                <a class="btn btn-danger" href="{{ url('deleteRecentPost', ['recentPost' => $rp->id]) }}">Delete</a>
                @endrole
                </div>
            </div>
        </div>
    @endforeach
            @if($recentPosts->count() == 0)
                <h1 class="mt-5 text-center text-black">
                    Not Found.
                </h1>
            @endif
    </div>
    {{$recentPosts->links()}}
</div>


<style>
    .row {
        text-align: center;
    }
    #card {
        min-height: 300px;
    }
    .male {
        background-color: #154ad2;
        color: white;
        transition: all .2s ease-in-out;
    }
    .male:hover {
        background-color: #14368a;
        transform: scale(1.02);
    }
    .female {
        background-color: rgb(177, 63, 150);
        color: white;
        transition: all .2s ease-in-out;
    }
    .female:hover {
        background-color: #a3078c;
        transform: scale(1.02);
    }
    .categ:first-letter{
        text-transform: uppercase;
    }
    .select {
        background-color: white;
        color: black;
        height: 40px;
        border: none;
        width: 500px;
    }
    .search {
        background-color: white;
        color: black;
        height: 40px;
        border-radius: 2px;
        border: none;
        width: 500px;
    }
</style>
