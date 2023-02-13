<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConrtactRequest;
use App\Mail\ContactThanks;

class RakutenGameController extends Controller
{
    public function Top(Request $request){
        // configからアプリケーションIDを取得
        $appid = config('rakuten_api.appid');
        // cURLでデータ取得
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId={$appid}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        curl_close($ch);
        $result = json_decode($html, true);
        // $resultを解析、必要なデータだけを取得
        $inputs = $request->all();

        $datas = $this->getRakutenItems( "ゲーム総合ランキング" , 101205 );
        return view('input',$datas);
    }

    public function search(Request $request){
        // $resultを解析、必要なデータだけを取得
        $inputs = $request->all();
        \Cookie::queue("keyword", $request->keyword, 60 * 24 );
        
        $datas = [
            "tag" => "検索結果" ,
            "page_title" => "検索結果" ,
            "keyword" => $request->keyword ,
            "items" => [] ,
        ];
        return view('input', $datas);
    }

    public function NintendoSwitch(Request $request){
        // configからアプリケーションIDを取得
        $appid = config('rakuten_api.appid');
        // cURLでデータ取得
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId={$appid}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        curl_close($ch);
        $result = json_decode($html, true);
        // $resultを解析、必要なデータだけを取得
        $inputs = $request->all();

        $datas = $this->getRakutenItems( "NintendoSwitchランキング" , 565950 );
        return view('input',$datas);
    }

    public function PS5(Request $request){
        // configからアプリケーションIDを取得
        $appid = config('rakuten_api.appid');
        // cURLでデータ取得
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId={$appid}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        curl_close($ch);
        $result = json_decode($html, true);
        // $resultを解析、必要なデータだけを取得
        $inputs = $request->all();

        $datas = $this->getRakutenItems( "PS5ランキング" , 568375 );
        return view('input',$datas);
    }

    public function PS4(Request $request){
        // configからアプリケーションIDを取得
        $appid = config('rakuten_api.appid');
        // cURLでデータ取得
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId={$appid}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        curl_close($ch);
        $result = json_decode($html, true);
        // $resultを解析、必要なデータだけを取得
        $inputs = $request->all();

        $datas = $this->getRakutenItems( "PS4ランキング" , 563544 );
        return view('input',$datas);
    }

    public function XboxSeriesXS(Request $request){
        // configからアプリケーションIDを取得
        $appid = config('rakuten_api.appid');
        // cURLでデータ取得
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId={$appid}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        curl_close($ch);
        $result = json_decode($html, true);
        // $resultを解析、必要なデータだけを取得
        $inputs = $request->all();

        $datas = $this->getRakutenItems( "XboxSeriesXSランキング",  568382 );
        return view('input',$datas);
    }

    public function getRakutenItems( $tag, $genreId ){
        $keyword = \Cookie::get('keyword');

        // configからアプリケーションIDを取得
        $appid = config('rakuten_api.appid');
        // cURLでデータ取得
        $url = "https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId={$appid}&genreId={$genreId}&keyword={$keyword}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        curl_close($ch);
        $result = json_decode($html, true);
        // https://qiita.com/wanwanland/items/a5f9574fadd214d7b5c8

        // $resultを解析、必要なデータだけを取得
        $items = [];
        $max = count($result['Items']) > 10 ? 10 : count($result['Items']);
        for($i = 0; $i < $max; $i++) {
            $item = $result['Items'][$i]['Item'];
            $items[] = [
                "ranking" =>$item["rank"] ,
                "name" => $item["itemName"] ,
                "price" => $item["itemPrice"] ,
                "shop" => $item["shopName"] ,
            ];
        }
        return [
            "tag" => $tag ,
            "page_title" => $tag ,
             "items" => $items ,
             "keyword" => $keyword ,
        ];
    }
}
