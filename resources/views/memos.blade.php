@extends('layouts.welcome')

@section('content')
<p>メモテーブルの中身を表示する</p>

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

@endsection
