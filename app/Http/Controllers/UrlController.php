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

            if ($request->has('token')) {
                if (!is_string($request->token) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $request->token) !== 1)) {
                    throw new \Exception("Not a valid `token`. Should be structured as UUIDv4.", 400);
                }
            }

            $rUrl = $this->getDomainFromUrl($request->url);
            $tUrl = $this->getDomainFromUrl(url());

            if ($rUrl == $tUrl) {
                throw new \Exception("Can not short an `url` from this domain", 400);
            }

            if ($request->has('custom_code')) {
                if (preg_match('/[^a-z_\-0-9]/i', $request->custom_code)) {
                    throw new \Exception("The `custom_code` has to be alpha-numeric only", 400);
                }
                if (strlen($request->custom_code) > 150) {
                    throw new \Exception("The `custom_code` length has to be 150 or less", 400);
                }
                $url = Url::whereRaw('BINARY `shorten_url` = ?', [ $request->custom_code ])->first();
                if(!$url) {
                    $url = new Url();
                    $url->shorten_url = $request->custom_code;
                    $url->real_url = $request->url;
                    $url->click_counter = 0;
                    $url->shorten_counter = 1;
                    $url->type = 1;
                    $url->save();
                } else if ($url->real_url == $request->url) {
                    $url->shorten_counter += 1;
                    $url->save();
                } else {
                    throw new \Exception("The `custom_code` has already been taken by other url", 400);
                }

            } else {
                $url = Url::where('real_url', $request->url)->where('type', 0)->first();

                if(!$url) {
                    $url = new Url();
                    $url->shorten_url = $this->uniqueRandomString(3);
                    $url->real_url = $request->url;
                    $url->click_counter = 0;
                    $url->shorten_counter = 1;
                    $url->save();
                } else {
                    $url->shorten_counter += 1;
                    $url->save();
                }
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
                'shorten_url_code' => $tUrl . "/$url->shorten_url",
                'click_counter' => (int) $url->click_counter,
                'shorten_counter' => (int) $url->shorten_counter
            ];

            return $this->buildResponse(true, 200, 'Short URL success', $response);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->buildResponse(false, $th->getCode(), $th->getMessage());
        }
    }

    public function redirect(Request $request, $url)
    {
        try {
            $url = Url::whereRaw('BINARY `shorten_url` = ?', [ $url ])->first();
            if (!$url) {
                throw new \Exception("Url not found", 404);
            }
            $url->click_counter += 1;
            $url->save();
            return redirect()->to($url->real_url);
        } catch (\Throwable $th) {
            return $this->buildResponse(false, $th->getCode(), $th->getMessage());
        }

    }

    private function uniqueRandomString($length, $threshold = 100) : String {
        $lastUrl = Url::latest()->first();
        $application_id = $lastUrl ? $lastUrl->id : 0;
        $counter = 0;
        do {
            if ($counter > $threshold) {
                $counter = 0;
                $length += 1;
            }
            $randomCode = $this->getToken($length, $application_id);
            $shorten_url = Url::whereRaw('BINARY `shorten_url` = ?', [ $randomCode ])->get();
            $application_id += 1;
            $counter += 1;
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
