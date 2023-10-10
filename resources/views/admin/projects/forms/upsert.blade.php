<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf
    @method($method)

    {{-- title --}}
    <div class="mb-3">
        <label class="form-label">Project's Title</label>
        <input name="title" value="{{ old('title', $project?->title) }}"
            class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- description --}}
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Project's Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
            rows="3" name="description">{{ old('description', $project?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- thumb --}}
    <div class="mb-3">
        <label class="form-label">Project's Image</label>

        @if($project?->thumb)
            <div>
                <img src="
                    @if (str_contains(asset('/storage/' . $project?->thumb), 'projects')) 
                        {{ asset('/storage/' . $project?->thumb) }}   
                    @else
                        {{ $project?->thumb }} 
                    @endif " 
                class="img-thumbnail" width="100px" alt="">
            </div>
        @endif

        <input type="file" name="thumb" class="form-control @error('thumb') is-invalid @enderror">
        @error('thumb')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- release_date --}}
    <div class="mb-3">
        <label class="form-label">Project's Release Date</label>
        <input type="date" name="release_date" class="form-control @error('release_date') is-invalid @enderror"
            value="{{ old('release_date', $project?->release_date) }}">
        @error('release_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- link --}}
    <div class="mb-3">
        <label class="form-label">Project's link</label>
        <input name="link" class="form-control @error('link') is-invalid @enderror"
            value="{{ old('link', $project?->link) }}">
        @error('link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    @if ($method == 'post')
        <div class="w-100 text-end my-3">
            <button class="btn btn-success">Create</button>
        </div>
    @elseif ($method == 'patch')
        <div class="w-100 text-end my-3">
            <button class="btn btn-warning">Update</button>
        </div>
    @endif
</form>
