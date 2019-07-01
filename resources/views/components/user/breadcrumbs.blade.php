@if (count($breadcrumbs))
  <div class="m-breadcrumb">
    <ul class="">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class=""><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> > </li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
  </div>
@endif