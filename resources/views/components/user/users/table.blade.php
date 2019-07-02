<table class="table table-borderless c-users-table">
  <tbody>
    <tr>
      <th scope="row">プロフィール写真</th>
      <td>
        <img src="{{ $user->image->url }}" style="width: 32px; height: 32px;">
      </td>
    </tr>
    <tr>
      <th scope="row">お名前</th>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th scope="row">概要</th>
      <td>{{ $user->description }}</td>
    </tr>
    <tr>
      <th scope="row">メールアドレス</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th scope="row">
        {{ date('Y年m月', strtotime('first day of previous month')) }}
        の売り上げ
      </th>
      <td>{{ $user->last_mounth_sales }} 円</td>
    </tr>
    <tr>
      <th scope="row">
        {{ date('Y年m月', strtotime('first day of previous month')) }}
        のPV
      </th>
      <td>{{ $user->last_mounth_pv }} pv</td>
    </tr>
    <tr>
      <th scope="row">ブログ</th>
      <td>
        <a href="{{ $user->blog_url }}" target="_blank">{{ $user->blog_url }}</a>
      </td>
    </tr>
    <tr>
      <th scope="row">
        <i class="fa-twitter"></i>
        Twitter
      </th>
      <td>
        <a href="{{ $user->tw_url }}" target="_blank">{{ $user->tw_url }}</a>
      </td>
    </tr>
  </tbody>
</table>