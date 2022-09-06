<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo ;
use Symfony\Component\HttpFoundation\StreamedResponse;

class homePageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // invokeはコントローラーに一つのアクションを記載する時に使うもの
    // public function __invoke(Request $request)
    // {
    //     //
    //     return view('welcome');
    // }

    public function index()
    {
        // $data = $request->all();
        // dd($data);

        return view('welcome');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        // dd($data);
        //postされたメモを登録 insertGetIdで挿入したIdを取得
        $memo_id = Memo::insert(['term' => $data['term'],'content' => $data['content']]);
        // $memo_id = Memo::insert(['term' => $data['term'], 'content' => $data['memo']]);

        return redirect()->route('jquery');
    }

    public function jquery()
    {
        // $memos = Memo::all();
        return view('jquery',compact('memos'));
    }

    public function vue()
    {
        return view('vue');
    }

    public function memos()
    {
        // $memos = Memo::where('id',8) ->first();
        $memos = Memo::all();
        // dd($memos);
        return view('memos',compact('memos'));
    }

    public function download(Request $request)
    {
        $memos = Memo::all();

        $cvsList = [
            ['id', 'term', 'content']
       ];

       foreach($memos as $memo){
            $additem = [];
            array_push($additem,$memo['id']);
            array_push($additem,$memo['term']);
            array_push($additem,$memo['content']);
            array_push($cvsList,$additem);
        };


       $response = new StreamedResponse (function() use ($request, $cvsList){
           //php://~~は入出力ストリームを指定できる。outputは書き込み用のストリーム。
           $stream = fopen('php://output', 'w');

           //　文字化け回避
           stream_filter_prepend($stream,'convert.iconv.utf-8/cp932//TRANSLIT');

           // CSVデータ
           foreach($cvsList as $key => $value) {
               fputcsv($stream, $value);
           }
           fclose($stream);
       });
       //Content-Typeにはmimeタイプを指定する。指定したタイプによってブラウザの挙動がダウンロードや表示になる
       //未知のタイプを指定するとダウンロードになる。application/octet-streamは公式でダウンロードできる指定値
       $response->headers->set('Content-Type', 'application/octet-stream');
       //Content-Dispositionは挙動を指定するもの
       $response->headers->set('Content-Disposition', 'attachment; filename="sample.csv"');

       return $response;
    }
}
