<div>
    <h1>Edit Post</h1>
    <div class="card offset-4" id="post-edit">

    @if (session('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
        <div class="card-header">
            <h5 class="text-center mt-2">Select Category</h5>
            <select name="category" id="select-cat" class="text-center" wire:model.defer="category">
                <option hidden="true">Category</option>
                <option selected disabled>Category</option>
                <option value="others">Others</option>
                <option value="drama">Drama</option>
                <option value="action">Action</option>
                <option value="sweet">Sweet</option>
                <option value="comedy">Comedy</option>
                <option value="horror">Horror</option>
            </select>
                @error('category')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror
        </div>
        <div class="card-body">
            <textarea name="remarks" id="" cols="58" rows="5" wire:model.defer="remarks"></textarea>
        </div>

            @error('remarks')
                <p class="text-danger text-center">{{ $message }}</p>
            @enderror
        <button class="btn btn-success" wire:click="editRecentPost()">Update</button>
        <button class="btn btn-secondary mt-1" wire:click="back2()">
            Cancel
        </button>
    </div>
</div>


<style>
    #post-edit {
        width: 570px;
    }
    #select-cat {
        width: 120px;
        margin-left: 39%;
    }
</style>
