<ul class="Repos">
    @if(count($repos) > 0)
        @foreach($repos as $repo => $individual)
            <li class="Repo">
                <p>{{ $individual->name ?? '' }}</p>
                <p>{{ $individual->html_url ?? '' }}</p>
            </li>
        @endforeach
    @endif
</ul>


