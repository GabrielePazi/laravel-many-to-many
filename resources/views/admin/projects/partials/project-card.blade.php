<div class="card" style="width: 30%">
    <img src="
        @if (str_contains(asset('/storage/' . $project->thumb), 'projects')) 
            {{ asset('/storage/' . $project->thumb) }}   
        @else
            {{ $project->thumb }}
        @endif
        "
        class="card-img-top" style="height: 150px; object-fit:cover" alt="...">
    <div class="card-body">

        {{-- title --}}
        <h5 class="card-title">{{ ucfirst($project->title) }}</h5>

        {{-- description --}}
        <p class="card-text text-secondary">{{ $project->description }}</p>

        {{-- date --}}
        <h6>Release: <span class="card-text text-secondary">{{ date('d-m-Y', strtotime($project->release_date)) }}</span>
        </h6>

        {{-- actions --}}
        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary w-100 my-2">Details</a>
        <div class="d-flex gap-1 w-100">
            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning w-50">Modify</a>

            <form class="w-50" action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
                @csrf
                @method('delete')

                <button class="btn btn-danger w-100">Delete</button>
            </form>
        </div>
    </div>

    {{-- link --}}
    <div class="card-footer">
        <a href="{{ $project->link }}" class="text-decoration-none text-black fw-bolder">Github link</a>
    </div>
</div>
