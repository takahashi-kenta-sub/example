@extends('layouts.welcome')

@section('content')
<div id="app">
    <?php //@をつけないとエラーになる?>
    <h3>@{{ title }}</h3>
    <test-tag>テスト</test-tag>
    <ul>
        <li>
            <dl>
                <dt>v-if:タグの表示非表示に使う。</dt>
                <dd v-if="vif">
                    状態：@{{ vif }}
                </dd>
                <button v-on:click="vifsw">切替 </button>
            </dl>
        </li>
        <li>
            <dl>
                <dt>v-bind:タグの属性操作に使う。例）v-bind（省略可）:class="~"</dt>
                <dd v-bind:class="big">
                    このタグのクラス：@{{ big }}
                </dd>
                {{-- <button v-on:click="tagClass">スイッチ</button> --}}
            </dl>
        </li>
        <li>
            <dl>
                <dt>v-for:dataで宣言した配列の要素を繰り返し取得する。例）v-for="変数名 in 配列名"　変数名.要素名でアクセス</dt>
                <dd v-for="test in tests">
                    @{{ test.name }}
                </dd>
                <button v-on:click="addbro">兄弟を増やす </button>
                <button v-on:click="redubro">兄弟を減らす </button>
            </dl>
        </li>

        <li>
            <dl>
                <dt>v-model:例）</dt>
                <dd>
                </dd>
            </dl>
        </li>

        <li>
            <dl>
                <dt>computed:例）</dt>
                <dd>
                </dd>
            </dl>
        </li>

        <li>
            <dl>
                <dt>created:例）</dt>
                <dd>
                </dd>
            </dl>
        </li>

        <li>
            <dl>
                <dt>watch:例）</dt>
                <dd>
                </dd>
            </dl>
        </li>

    </ul>
    <test-tag>テスト2</test-tag>
</div>
@endsection
