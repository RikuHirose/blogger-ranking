<table class="table c-ranking-table">
  <tbody>
    @foreach($users as $user)

      <tr>
        <td class="rank">
          <?php
            $rank = $loop->iteration + 3;
          ?>
          {{ $rank }}
        </td>
        <td class="image">
          <img class="rounded-circle" src="{{ $user->image->url }}" alt="" width="48px" height="48px">
        </td>
        <td class="name">{{ $user->name }}</td>
        <td class="info">
          {{ $user->last_mounth_sales }} 円
          /
          {{ $user->last_mounth_pv }} pv
        </td>
        <td class="desc">
          <a href="{{ route('users.show', $user->id) }}" class="m-btn">詳細</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>