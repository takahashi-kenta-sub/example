@extends('layouts.welcome')

@section('content')
<p>jquery</p>
<ul class="slidetoggle accordion-container">
    <li>
        <dl>
            <dt>slideToggle</dt>
            <dd style="display: none">
                $(this).next().slideToggle()
                イベント対象は$(this)で記述可能。
                thisの場合はシングルコーテーション不要。
                next()でイベント対象の次の要素を取得できる。
            </dd>
        </dl>
    </li>

</ul>

@foreach ($memos as $memo)
<ul class="slidetoggle accordion-container">
    <li>
        <dl>
            <dt>{{ $memo['term'] }}</dt>
            <dd>
                {{ $memo['content'] }}
            </dd>
        </dl>
    </li>
</ul>
@endforeach

<form action="/update" method="post" class="form-example">
    {{-- つけないと419eroor--}}
    @csrf

    <div class="form-example form-group">
        <label for="name">用語</label>
        <input type="text" name="term" id="name"  class="form-control" required>
    </div>
    <div class="form-example form-group">
        <label for="content">メモ</label>
        <input type="text" name="content" id="memo" class="form-control" required>
    </div>
    <div class="form-example form-group">
        <input type="submit" value="追加!" class="btn btn-primary">
    </div>
</form>

@endsection
