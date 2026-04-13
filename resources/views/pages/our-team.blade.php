@foreach ($teamCategories as $categories)
    @php
        $teamsInCategory = $teams->where('team_categories_id', $categories->id);
    @endphp
    @if ($teamsInCategory->isNotEmpty())
        <h2 class="mb-3 text-center">{{ $categories->name }}</h2>
        <div class="four-items-dots our-teams text-center">
            @foreach ($teams as $team)
                @if ($categories->id == $team->team_categories_id)
                    <div class="item">
                        <div class="card">
                            <a href="#">
                                <img src="{{ asset(TEAM_IMAGE_PATH . $team->image) }}" alt="{{ $team->name }}"
                                    alt="{{ $team->name }}" class="card-img-top">
                            </a>
                            <div class="card-body align-items-start">
                                <h5 class="mb-0">{{ $team->name }}</h5>
                                <span class="badge badge-primary badge-top">{{ $team->designation }}</span>
                                {!! $team->description !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endforeach
