<div class="card" style="width: 30%">
    <img src="
        @if (str_contains(asset('/storage/' . $project->thumb), 'projects')) {{ asset('/storage/' . $project->thumb) }}   
        @else
            {{ $project->thumb }} @endif
        "
        class="card-img-top" style="height: 150px; object-fit:cover" alt="...">
    <div class="card-body">

        {{-- title --}}
        <h5 class="card-title">{{ ucfirst($project->title) }}</h5>
        <h5><span class="badge bg-primary display-5">{{ $project->type?->title }}</span></h5>


        {{-- technologies --}}
        @foreach ($project->technologies as $technology)
            <div class="badge" style="background-color: rgb({{ $technology->color }})">{{ $technology->title }}</div>
        @endforeach

        {{-- description --}}
        <p class="card-text text-secondary">{{ ucfirst($project->description) }}</p>

        {{-- date --}}
        <h6>Release: <span
                class="card-text text-secondary">{{ date('d-m-Y', strtotime($project->release_date)) }}</span>
        </h6>

        {{-- actions --}}
        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary w-100 my-2">Details</a>
        <div class="d-flex gap-1 w-100">
            @if ($project->deleted_at == null)
                <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning w-50">Modify</a>
            @else
                <a href="{{ route('admin.projects.restore', $project->slug) }}"
                    class="btn btn-warning w-50">Restore</a>
            @endif

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
