<?php

namespace App\Http\Controllers;

use App\Url;
use App\UrlsHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function short(Request $request)
    {
        DB::beginTransaction();
        try {
            if (!$request->has('url')) {
                throw new \Exception("Parameter `url` required", 400);
            }
            if ($request->url == '') {
                throw new \Exception("Parameter `url` required", 400);
            }
            if (!filter_var($request->url, FILTER_VALIDATE_URL)) {
                throw new \Exception("Not a valid `url`", 400);
            }

            $rUrl = $this->getDomainFromUrl($request->url);
            $tUrl = $this->getDomainFromUrl(url());

            if ($rUrl == $tUrl) {
                throw new \Exception("Can not short an `url` from this domain", 400);
            }

            $url = Url::where('real_url', $request->url)->first();

            if(!$url) {
                $url = new Url();
                $url->shorten_url = $this->uniqueRandomString(5);
                $url->real_url = $request->url;
                $url->click_counter = 0;
                $url->shorten_counter = 1;
                $url->save();
            } else {
                $url->shorten_counter += 1;
                $url->save();
            }

            $urlsHistory = new UrlsHistory();
            $urlsHistory->ip = $request->getClientIp();
            $urlsHistory->urls_id = $url->id;
            $urlsHistory->token = $request->token;
            $urlsHistory->save();

            DB::commit();

            $response = [
                'id' => $url->id,
                'real_url' => $url->real_url,
                'shorten_url' => url($url->shorten_url),
                'click_counter' => $url->click_counter,
                'shorten_counter' => $url->shorten_counter
            ];

            return $this->buildResponse(true, 200, 'Short URL success', $response);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->buildResponse(false, $th->getCode() != 0 ? $th->getCode() : 500, $th->getMessage());
        }
    }

    public function redirect(Request $request, $url)
    {
        try {
            $url = Url::where('shorten_url', $url)->first();
            if (!$url) {
                throw new \Exception("Url not found", 404);
            }
            $url->click_counter += 1;
            $url->save();
            return redirect()->to($url->real_url);
        } catch (\Throwable $th) {
            return $this->buildResponse(false, 500, $th->getMessage());
        }

    }

    private function uniqueRandomString($length) {
        $lastUrl = Url::latest()->first();
        $application_id = $lastUrl ? $lastUrl->id : 0;
        do {
            $randomCode = $this->getToken($length, $application_id);
            $shorten_url = Url::where('shorten_url', $randomCode)->get();
            $application_id += 1;
        } while(!$shorten_url->isEmpty());
        return $randomCode;
    }

    private function getToken($length, $seed){
        $token = "";
        $codeAlphabet = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz";
        $codeAlphabet.= "0123456789";
        $codeAlphabet = str_shuffle($codeAlphabet);

        mt_srand($seed);      // Call once. Good since $application_id is unique.

        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[mt_rand(0,strlen($codeAlphabet)-1)];
        }
        return $token;
    }

    private function getDomainFromUrl($url) {
        $host = (parse_url($url, PHP_URL_HOST) != '') ? (parse_url($url, PHP_URL_PORT) != '' ? parse_url($url, PHP_URL_HOST).':'.parse_url($url, PHP_URL_PORT) : parse_url($url, PHP_URL_HOST) )  : $url;
        return preg_replace('/^www\./', '', $host);
    }
}
