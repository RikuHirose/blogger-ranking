@foreach($userCategories as $userCategory)
  <span class="m-tag">{{ $userCategory->category->name }}</span>
  @break(($loop->iteration + 1) == 3)
@endforeach