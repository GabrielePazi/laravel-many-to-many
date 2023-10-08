<div class="card" style="width: 30%">
  <img src="{{ $project->thumb }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $project->title }}</h5>
    <p class="card-text">{{ $project->description }}</p>
    <p class="card-text">{{ $project->release_date }}</p>
    <a href="#" class="btn btn-primary">{{ $project->link }}</a>
  </div>
</div>