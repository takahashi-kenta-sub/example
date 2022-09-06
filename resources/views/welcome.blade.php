@extends('layouts.welcome')

@section('parent')
<p>子要素の上表示</p>
@parent
<p>子要素の下表示</p>
@endsection

@section('content')
<p>HOME!!</p>
<ul>
    <li>
        名前：NAMI
    </li>
    <li>
        性別：女
    </li>
    <li>
        誕生：2022/04/27
    </li>
</ul>
@endsection
