<table class="table c-ranking-table-sp">
  @if(!is_null($top3Users))
    <tbody>
      @foreach($top3Users as $user)

        <tr class="top3-box">
          <td class="rank">
            {{ $loop->iteration }}
          </td>
          <td class="image">
            <img class="rounded-circle" src="{{ $user->image->url }}" alt="" width="48px" height="48px">
          </td>
          <td class="info">
            <p class="user-name">
              <i class="fa-crown" ranking="{{ $loop->iteration }}"></i>
              {{ $user->name }}
            </p>
            <p>
              {{ $user->last_mounth_sales }} 円
              /
              {{ $user->last_mounth_pv }} pv
            </p>
          </td>
          <td class="desc">
            <a href="{{ route('users.show', $user->id) }}" class="m-btn">詳細</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  @endif

  @if(!is_null($subordinateUsers))
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
          <td class="info">
            <p class="user-name">{{ $user->name }}</p>
            <p>
              {{ $user->last_mounth_sales }} 円
              /
              {{ $user->last_mounth_pv }} pv
            </p>
          </td>
          <td class="desc">
            <a href="" class="m-btn">詳細</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  @endif
</table>