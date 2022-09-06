<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap5 CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        {{-- jquery CDN --}}
         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        {{-- Vue CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>


        <!-- Styles -->
        <style>
            .app {
                width: 100vw;
                height: 100vh;
                display: flex;
                flex-direction: column;
            }

            nav{
                height: 60px;
                font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                background-color: lightcyan;
                box-sizing: border-box;
                border: 3px solid rgb(114, 148, 212);
                text-align: center;
                font-size: 25px;
                vertical-align: middle;
            }

            main {
                display: flex;
                flex-direction: row;
                flex-grow: 1;
            }

            .sidebar {
                width: 200px;
                background-color: rgb(181, 219, 255);
                box-sizing: border-box;
                border: 3px solid rgb(142, 209, 226);
            }
            .sidebarTitle {
                margin-left: 8px;
                margin-right: auto;
                font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            }

            .content {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                margin: 10px;
            }

            .flex-content {
                flex-grow: 1;
                background-color: white;
                box-sizing: border-box;
            }

            .accordion-container {
                position: relative;
            }

            .accordion-container .accordion-title::after {
                content: "";
                position: absolute;
                top: 25px;
                right: 25px;
                width: 0;
                height: 0;
                border: 8px solid transparent;
                border-top-color: #fff;
            }

            .accordion-container .accordion-title.open::after {
                content: "";
                position: absolute;
                top: 15px;
                border: 8px solid transparent;
                border-bottom-color: #fff;
            }

            .form-example{
                padding: 2px;
                margin-bottom: 4px;
                width: 50%
            }

            .big{
                font-size: 15px;
            }

        </style>
    </head>

    <body class="antialiased">
        <div class="app">
            <nav class="navi">
                <p class="h1">Learning</p>
            </nav>

            <main>
                <div class="sidebar">
                    <div class="sidebarTitle">
                        <p class="h5">Sidebar</p>
                    </div>
                    <ul>
                        <li>
                            <a href="/">home</a>
                        </li>

                        <li>
                            <a href="/jquery">jquery</a>
                        </li>
                        <li>
                            <a href="/vue">vue</a>
                        </li>
                        <li>
                            <a href="/memos">memos</a>
                        </li>
                    </ul>
                </div>

                <div class="content">

                    <div class="flex-content">

                        @section('parent')
                            <p>親要素の表示</p>
                            <ul>
                                <li>@show</li>
                            </ul>

                        <p>セクション外の要素</p>

                        @yield('content')
                    </div>
                </div>
            </main>
    </div>

    <script>
        Vue.component('test-tag',{
            template:`
            <div class="content">
                <p>conponentを使用した要素</p>
                <slot></slot>
            </div>
            `
        });
        var app = new Vue({
            el:"#app",
            data:{
                title:"VUE!",
                vif:true,
                big:"test_class",
                tests:[
                    {name:"太郎"},
                    {name:"二郎"},
                    {name:"三郎"},
                    ]
            },

            //算出プロパティcomputedはキャッシュ機能を持つ。リアクティブなデータ以外は基本的にmethodsを使用する。
            //例えば苗字と名前からフルネームを出すときはキャッシュを使って表示できたほうがよいためcomputedを使用する。
            //watchを使用するケースは以下
            //・非同期通信などを使用するとき
            //・更新前の値と更新後の値を使用するとき
            //・処理を実行してもデータを返さない時

            methods:{
                //dataで宣言した変数にアクセスする場合はthisを使う。
                vifsw:function(e){
                    console.log("ボタンクリック！");
                    if(this.vif==true){
                        this.vif = false;
                    }
                    else{
                        this.vif = true;
                    }
                },
                addbro:function(e){
                    console.log("クリック");
                    var bro = {
                        name:'弟'
                    };
                    this.tests.push(bro);
                    console.log(this.tests);
                },
                redubro:function(e){
                    console.log("クリック");
                    this.tests.shift();
                    console.log(this.tests);
                }
            }
        });
    </script>

    <script>
        //jqeuryを使うための記述
        $(function(){
            $(".slidetoggle dt").on("click",function(){
                $(this).next().slideToggle();
            });
        });
    </script>

    </body>
</html>
