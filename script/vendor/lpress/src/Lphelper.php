<?php 
namespace Amcoders\Lpress;
use Illuminate\Support\Facades\Http;
use App\Menu;
use App\Models\Adminmenu;
use App\Category;
use App\Option;
use Session;
use Auth;
use Cache;

class Lphelper
{
	protected static $position;

	public static function Menu($position,$ul='',$li='',$a='',$icon_position='top',$lang=false){
		Lphelper::$position=$position;
		if ($lang==false) {
			$menus=cache()->remember($position.Session::get('locale'),200,function(){
			return Adminmenu::where('position',Lphelper::$position)->where('status',1)->where('lang','en')->first();
			});
		}
		else{
		   $menus=cache()->remember($position.Session::get('locale'),200,function(){
			return $menus=Adminmenu::where('position',Lphelper::$position)->where('status',1)->where('lang',Session::get('locale'))->first();
			});
		}
		return view('lphelper::lphelper.lpmenu.parent', compact('menus','ul','li','a','icon_position'));  
	}

	public static function MenuCustom($position,$ul='',$li='',$a='',$icon_position='top',$lang=false){
		Lphelper::$position=$position;

		if ($lang==false) {
			 $menus=cache()->remember($position.Session::get('locale'),200,function(){
			 	 $menus=Adminmenu::where('position',Lphelper::$position)->where('status',1)->where('lang','en')->first();
				  $data['name']=$menus->name ?? '';
				  $data['data']=json_decode($menus->data ?? '');
				  return $data;
				});
			
		}
		else{
			 $menus=cache()->remember($position.Session::get('locale'),200,function(){
			 	 $menus=Adminmenu::where('position',Lphelper::$position)->where('status',1)->where('lang',Session::get('locale'))->first();
				 $data['name']=$menus->name ?? '';
				 $data['data']=json_decode($menus->data ?? '');
				 return $data;
			});	
			
		}


		return view('lphelper::lphelper.lpmenucustom.parent', compact('menus','ul','li','a','icon_position'));  
	}

	public static function MenuCustomForUser($position,$ul='',$li='',$a='',$icon_position='top'){
		Lphelper::$position=$position;

		$menus=cache()->remember($position.'menu'.domain_info('user_id'),300,function(){
			$menus=Menu::where('position',Lphelper::$position)->where('user_id',domain_info('user_id'))->first();
			$data['name']=$menus->name ?? '';
			$data['data']=json_decode($menus->data ?? '');
			return $data;
		});
			
		return view('lphelper::lphelper.lpmenucustom.parent', compact('menus','ul','li','a','icon_position'));  
	}

	public static function ConfigCategory($type,$select = ''){

		if (Auth::user()->role_id==3) {
			$categories = Category::where('user_id',Auth::id())->whereNull('p_id')->where('name','!=','Uncategorizied' )->select('id','name','p_id')->where('type',$type)
			->with('childrenCategories')
			->get();
		}
		else{
			$categories = Category::whereNull('p_id')->where('name','!=','Uncategorizied' )->select('id','name','p_id')->where('type',$type)
		->with('childrenCategories')
		->get();
		}
		

		return view('lphelper::lphelper.categoryconfig.parent', compact('categories','select')); 
	}

	public static function ConfigCategoryMulti($type,$select = []){

		if (Auth::user()->role_id==3) {
			$categories = Category::where('user_id',Auth::id())->whereNull('p_id')->where('name','!=','Uncategorizied' )->select('id','name','p_id')->where('type',$type)
			->with('childrenCategories')
			->get();
		}
		else{
			$categories = Category::whereNull('p_id')->where('name','!=','Uncategorizied' )->select('id','name','p_id')->where('type',$type)
		->with('childrenCategories')
		->get();
		}
		

		return view('lphelper::lphelper.categoryconfig.parent', compact('categories','select')); 
	}

	public static function LPAdminCategory($type){
		if (Auth::user()->role_id==3) {
			$categories = Category::where('user_id',Auth::id())->whereNull('p_id')->select('id','name','p_id')->where('type',$type)
			->with('childrenCategories')
			->get();
		}
		else{
		$categories = Category::whereNull('p_id')->select('id','name','p_id')->where('type',$type)
		->with('childrenCategories')
		->get();	
		}		
		
		return view('lphelper::lphelper.category.categories', compact('categories')); 
	}

	public static function AdminLang($c='')
	{
		$data=Option::where('key','langlist')->select('value')->first();
		$data=json_decode($data->value);
		return view('lphelper::lphelper.lang.index',compact('data','c'));
	}

	public static function LPAdminCategoryUpdate($type,$arr = [])
	{
		if (Auth::user()->role_id==3) {
			$categories = Category::where('user_id',Auth::id())->whereNull('p_id')->select('id','name','p_id')->where('type',$type)
			->with('childrenCategories')
			->get();
		}
		else{
			$categories = Category::whereNull('p_id')->select('id','name','p_id')->where('type',$type)
			->with('childrenCategories')
			->get();
		}	
		
		return view('lphelper::lphelper.category.category_check', compact('categories','arr'));  
	}

	public static function Disqus()
	{
		$disqus_comment=Option::where('key','disqus_comment')->select('value')->first();

		if (!empty($disqus_comment)) {
			return view('lphelper::lphelper.script.disqus-comment',compact('disqus_comment'));
		}
	}

	public static function Token($token)
    {
        return make_token($token);
    }

	public static function TwkChat($param){
		return view('lphelper::lphelper.script.livechat',compact('param'));
	}




}

?>