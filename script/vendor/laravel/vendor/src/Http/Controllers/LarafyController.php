<?php
namespace Laravel\Larafy\Http\Controllers;
use Amcoders\Check\Everify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use DB;
use Illuminate\Support\Str;
use File;
use Session;

use Amcoders\Lpress\Lphelper;

class LarafyController extends Controller
{

	public function install()
    {


         try {
           DB::select('SHOW TABLES');
          return redirect('/404');
        } catch (\Exception $e) {

        }

        try {
          DB::connection()->getPdo();
          if(DB::connection()->getDatabaseName()){
            return abort(404);
          }else{
            $phpversion = phpversion();
            $mbstring = extension_loaded('mbstring');
            $bcmath = extension_loaded('bcmath');
            $ctype = extension_loaded('ctype');
            $json = extension_loaded('json');
            $openssl = extension_loaded('openssl');
            $pdo = extension_loaded('pdo');
            $tokenizer = extension_loaded('tokenizer');
            $xml = extension_loaded('xml');

            $info = [
                'phpversion' => $phpversion,
                'mbstring' => $mbstring,
                'bcmath' => $bcmath,
                'ctype' => $ctype,
                'json' => $json,
                'openssl' => $openssl,
                'pdo' => $pdo,
                'tokenizer' => $tokenizer,
                'xml' => $xml,
            ];
            return view('Larafy::requirments',compact('info'));
          }
        } catch (\Exception $e) {
            $phpversion = phpversion();
            $mbstring = extension_loaded('mbstring');
            $bcmath = extension_loaded('bcmath');
            $ctype = extension_loaded('ctype');
            $json = extension_loaded('json');
            $openssl = extension_loaded('openssl');
            $pdo = extension_loaded('pdo');
            $tokenizer = extension_loaded('tokenizer');
            $xml = extension_loaded('xml');

            $info = [
                'phpversion' => $phpversion,
                'mbstring' => $mbstring,
                'bcmath' => $bcmath,
                'ctype' => $ctype,
                'json' => $json,
                'openssl' => $openssl,
                'pdo' => $pdo,
                'tokenizer' => $tokenizer,
                'xml' => $xml,
            ];
            return view('Larafy::requirments',compact('info'));
        }


    }

    public function info()
    {

        try {
           DB::select('SHOW TABLES');
          return redirect('/404');
        } catch (\Exception $e) {

            return view('Larafy::info');
        }


    }

    public function send(Request $request)
    {

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
             $app_protocol = "https://";  
        } 
        else{
            $app_protocol = "http://";   
        }  
         
    
        $domain=strtolower(url('/'));
        $input = trim($domain, '/');
        if (!preg_match('#^http(s)?://#', $input)) {
            $input = 'http://' . $input;
        }
        $urlParts = parse_url($input);
        $domain = preg_replace('/^www\./', '', $urlParts['host']);
        $app_protocol_less_url=rtrim($domain, '/');

        $APP_NAME = Str::slug($request->app_name);
        $PUSHER_APP_KEY = $request->PUSHER_APP_KEY;
        $PUSHER_APP_CLUSTER = $request->PUSHER_APP_CLUSTER;
        $app_protocol_less_url=$app_protocol_less_url;
        $app_protocol=$app_protocol;
        $APP_URL_WITHOUT_WWW=str_replace('www.','', url('/'));
        $txt ="APP_NAME=".$APP_NAME."
APP_ENV=local
APP_KEY=base64:kZN2g9Tg6+mi1YNc+sSiZAO2ljlQBfLC3ByJLhLAUVc=
APP_DEBUG=true
APP_URL=".$request->app_url."
APP_PROTOCOLESS_URL=".$app_protocol_less_url."
APP_URL_WITHOUT_WWW=".$APP_URL_WITHOUT_WWW."
APP_PROTOCOL=".$app_protocol."
MULTILEVEL_CUSTOMER_REGISTER=false
LOG_CHANNEL=stack
LOG_LEVEL=debug
DB_CONNECTION=".$request->db_connection."
DB_HOST=".$request->db_host."
DB_PORT=".$request->db_port."
DB_DATABASE=".$request->db_name."
DB_USERNAME=".$request->db_user."
DB_PASSWORD=".$request->db_pass."\n
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120\n
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379\n
QUEUE_MAIL=off
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_TO=
MAIL_NOREPLY=
MAIL_FROM_NAME=\n
TIMEZONE=UTC
DEFAULT_LANG=en";
       File::put(base_path('.env'),$txt);
       return "Sending Credentials";
    }


public function check() { 

    try { DB::select('SHOW TABLES'); return "Database Installing"; } catch (\Exception $e) { return false; } 

} 

public function migrate() {

 ini_set('max_execution_time', '0'); \Artisan::call('migrate:fresh'); return "Demo Importing"; 

} 
public function seed(Request $request) {
	testSeed(); 
	return "Congratulations! Your site is ready"; 
} 

public function verify($key) {
	$check = Everify::Check($key);
	if ($check == true) {
		echo "success";
	} else {
		echo Everify::$massage;
	}
} 

public function purchase() { 
	try {
		DB::select('SHOW TABLES');
		return redirect('/404');
	} catch (\Exception $e) {
	}
	return view('Larafy::purchase');
} 

public function purchase_check(Request $request) {
	$this->validate($request, ['purchase_code' => 'required']);
	try {
		$check = \Amcoders\Check\Everify::Check($request->purchase_code);
		if ($check == true) {
			return redirect()->route('install.info');
		} else {
			Session::flash('alert', \Amcoders\Check\Everify::$massage);
			return back();
		}
	} catch (Exception $e) {
		return back();
	}
}




}
