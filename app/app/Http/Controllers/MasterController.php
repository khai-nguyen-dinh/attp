<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use DB;
use Session;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
class MasterController extends Controller
{
	    
    public function get($locale){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}		    	
    	App::setLocale($locale);

    	$data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
    	if($data['hot_news1']!=null){
	    	$data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';	 
	    	$data['title'] = $data['hot_news1']->c_name;   
		}
		

    	$data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
    	if($data['hot_news2']!=null)
            $data['title'] = $data['hot_news2']->c_name;

    	$data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
    	if($data['hot_news3']!=null){
    		$data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
    		$data['title'] = $data['hot_news3']->c_name;
    	}
    	

    	$data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
    	if($data['hot_news4']!=null){
    		$data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
    		$data['title'] = $data['hot_news4']->c_name;
    	}
    	

    	$data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
    	if($data['hot_news5']!=null){
    		$data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
    		$data['title'] = $data['hot_news5']->c_name;
    	}
    	

    	$data['hot'] = DB::table('tbl_news')->where([['c_lang',App::getLocale()],['c_status',1]])->take(5)->orderBy('pk_news_id','desc')->get();

    	$data['in_news1'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->first();
		$data['in_news2'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->skip(1)->take(4)->get();

		$data['out_news1'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news','<>',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->first();
		$data['out_news2'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news','<>',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->skip(1)->take(4)->get();

		$data['science'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->take(3)->get();

		$data['cate_service'] = DB::table('tbl_category_service')->where([
																	['c_lang',App::getLocale()],
																	['c_enable',1]		
																	])			
																->get();
		
		$data['cate_other'] = DB::table('tbl_category_other')->where([
																	['c_lang',App::getLocale()],
																	['c_enable',1]		
																	])			
																->get();																															
		$data['cate_about'] = DB::table('tbl_category_about')->where([
																	['c_lang',App::getLocale()],
																	['c_enable',1]		
																	])			
																->get();																							    	 						
		$data['video'] = DB::table('tbl_video')->where('c_lang',App::getLocale())->orderBy('pk_video_id','desc')->take(12)->get();	

		$data['document'] = DB::table('tbl_document')->where('c_lang',App::getLocale())->orderBy('pk_document_id','desc')->take(4)->get();

		
    	return view('pages.home',$data);

    }
    public function list_news($locale){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
    	App::setLocale($locale);
    	$data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
    	if($data['hot_news1']!=null){
	    	$data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';	 
	    	$data['title'] = $data['hot_news1']->c_name;   
		}

    	$data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
    	$data['title'] = $data['hot_news2']->c_name;

    	$data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
    	if($data['hot_news3']!=null){
    		$data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
    		$data['title'] = $data['hot_news3']->c_name;
    	}

    	$data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
    	if($data['hot_news4']!=null){
    		$data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
    		$data['title'] = $data['hot_news4']->c_name;
    	}

    	$data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
    	if($data['hot_news5']!=null){
    		$data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
    		$data['title'] = $data['hot_news5']->c_name;
    	}
    	
    	
    		$data['cate_news'] = DB::table('tbl_news')->where([
    														['c_lang',App::getLocale()],
    														['c_status',0]	
    													])->orderBy('pk_news_id','desc')->simplePaginate(15);
    	
    	return view('pages.cate_news',$data);
    }
    public function list_document($locale){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
    	App::setLocale($locale);
    	$data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
    	if($data['hot_news1']!=null){
	    	$data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';
	    	$data['title'] = $data['hot_news1']->c_name;	    
		}

    	$data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
    	$data['title'] = $data['hot_news2']->c_name;	

    	$data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
    	if($data['hot_news3']!=null){
    		$data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
    		$data['title'] = $data['hot_news3']->c_name;
    	}

    	$data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
    	if($data['hot_news4']!=null){
    		$data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
    		$data['title'] = $data['hot_news4']->c_name;
    	}

    	$data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
    	if($data['hot_news5']!=null){
    		$data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
    		$data['title'] = $data['hot_news5']->c_name;
    	}

    	$data['document'] = DB::table('tbl_document')->where('c_lang',App::getLocale())->orderBy('pk_document_id','desc')->simplePaginate(30);
    	return view('pages.document',$data);
    }
    public function list_science($locale){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
    	App::setLocale($locale);
    	$data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
    	if($data['hot_news1']!=null){
	    	$data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';	
	    	$data['title'] = $data['hot_news1']->c_name;    
		}

    	$data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
    	$data['title'] = $data['hot_news2']->c_name;

    	$data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
    	if($data['hot_news3']!=null){
    		$data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
    		$data['title'] = $data['hot_news3']->c_name;
    	}

    	$data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
    	if($data['hot_news4']!=null){
    		$data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
    		$data['title'] = $data['hot_news4']->c_name;
    	}

    	$data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
    	if($data['hot_news5']!=null){
    		$data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
    		$data['title'] = $data['hot_news5']->c_name;
    	}

    	
    		$data['list_science1'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
    		$data['list_science2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->skip(1)->take(2)->get();
    		$data['skip_news'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->take(3)->get();
    		if(count($data['skip_news'])==3){
    		$data['list_science3'] = DB::table('tbl_science')->where([
    			['c_lang',App::getLocale()],
    			['pk_science_id','<',$data['skip_news'][2]->pk_science_id]
    			])->orderBy('pk_science_id','desc')->simplePaginate(10);
    		}
    		else{$data['list_science3']=null;}
    		$data['folder_img'] = 'science';
    
    	return view('pages.list_news',$data);
    }
    public function cate_news($locale,$cate,$kind){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
    	App::setLocale($locale);
    	$data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
    	if($data['hot_news1']!=null){
	    	$data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';
	    	$data['title'] = $data['hot_news1']->c_name;	    
		}

    	$data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
    	$data['title'] = $data['hot_news2']->c_name;	

    	$data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
    	if($data['hot_news3']!=null){
    		$data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
    		$data['title'] = $data['hot_news3']->c_name;	
    	}

    	$data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
    	if($data['hot_news4']!=null){
    		$data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
    		$data['title'] = $data['hot_news4']->c_name;
    	}

    	$data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
    	if($data['hot_news5']!=null){
    		$data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
    		$data['title'] = $data['hot_news5']->c_name;
    	}

    	switch ($cate) {
    		case 'tin-tuc':
    			if($kind=='tin-trong-nuoc'){
    				$data['list_news1'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->first();
		    		$data['list_news2'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->skip(1)->take(2)->get();
		    		$data['skip_news'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->take(3)->get();
		    		if(count($data['skip_news'])==3){
		    		$data['list_news3'] = DB::table('tbl_news')->where([
		    			['c_lang',App::getLocale()],
		    			['c_category_news',1],
						['c_status',0],
		    			['pk_news_id','<',$data['skip_news'][2]->pk_news_id]
		    			])->orderBy('pk_news_id','desc')->simplePaginate(10);
		    		}
		    		else{$data['list_news3']=null;}
		    		$data['title'] = trans('a.tintrongnuoc');
		    		$data['url'] ='tin-tuc/tin-trong-nuoc';
		    		// $data['folder_img'] = asset('public/upload/news');

    			}
    			else if($kind=='tin-quoc-te'){
    				$data['list_news1'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news','<>',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->first();
		    		$data['list_news2'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news','<>',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->skip(1)->take(2)->get();
		    		$data['skip_news'] = DB::table('tbl_news')->where([
										    		['c_lang',App::getLocale()],
										    		['c_category_news','<>',1],
										    		['c_status',0]
										    		])
										    	 ->orderBy('pk_news_id','desc')->take(3)->get();
		    		if(count($data['skip_news'])==3){
		    		$data['list_news3'] = DB::table('tbl_news')->where([
		    			['c_lang',App::getLocale()],
		    			['c_category_news','<>',1],
						['c_status',0],
		    			['pk_news_id','<',$data['skip_news'][2]->pk_news_id]
		    			])->orderBy('pk_news_id','desc')->simplePaginate(10);
		    		}
		    		else{$data['list_news3']=null;}
		    		$data['title'] = trans('a.tinquocte');
		    		$data['url'] ='tin-tuc/tin-quoc-te';
		    		// $data['folder_img'] = asset('public/upload/news');

    			}
                else {return back();}
    			break;
    		case 'gioi-thieu':
    			$data['cate_about'] = DB::table('tbl_category_about')->where([
																	['c_lang',App::getLocale()],
																	['c_slug',$kind]
																	])			
																->first();
				if($data['cate_about']!==null){
				
						$data['list_news1'] = DB::table('tbl_about')->where([
											    		['c_lang',App::getLocale()],
											    		['fk_category_about_id',$data['cate_about']->pk_category_about_id]
											    		])
											    	 ->orderBy('pk_about_id','desc')->first();
			    		$data['list_news2'] = DB::table('tbl_about')->where([
											    		['c_lang',App::getLocale()],
											    		['fk_category_about_id',$data['cate_about']->pk_category_about_id]
											    		])
											    	 ->orderBy('pk_about_id','desc')->skip(1)->take(2)->get();
			    		$data['skip_news'] = DB::table('tbl_about')->where([
											    		['c_lang',App::getLocale()],
											    		['fk_category_about_id',$data['cate_about']->pk_category_about_id]
											    		])
											    	 ->orderBy('pk_about_id','desc')->take(3)->get();
			    		if(count($data['skip_news'])==3){
			    		$data['list_news3'] = DB::table('tbl_about')->where([
			    			['c_lang',App::getLocale()],
			    			['fk_category_about_id',$data['cate_about']->pk_category_about_id],
			    			['pk_about_id','<',$data['skip_news'][2]->pk_about_id]
			    			])->orderBy('pk_about_id','desc')->simplePaginate(10);
			    		}
			    		else{$data['list_news3']=null;}
			    		$data['url'] ='gioi-thieu/'.$data['cate_about']->c_slug;
			    		$data['title'] = $data['cate_about']->c_name;
			    		$data['folder_img'] = asset('public/upload/about');
		    		// $data['folder_img'] = asset('public/upload/news');				
				}
				else {return back();}	

    			break;
    		case 'dich-vu-phan-tich':
    			$data['cate_service'] = DB::table('tbl_category_service')->where([
																	['c_lang',App::getLocale()],
																	['c_slug',$kind]
																	])			
																->first();
																
				if($data['cate_service']!=null){
					$data['list_news1'] = DB::table('tbl_service')->where([
										    		['c_lang',App::getLocale()],
										    		['fk_category_service_id',$data['cate_service']->pk_category_service_id]
										    		])
										    	 ->orderBy('pk_service_id','desc')->first();
		    		$data['list_news2'] = DB::table('tbl_service')->where([
										    		['c_lang',App::getLocale()],
										    		['fk_category_service_id',$data['cate_service']->pk_category_service_id]
										    		])
										    	 ->orderBy('pk_service_id','desc')->skip(1)->take(2)->get();
		    		$data['skip_news'] = DB::table('tbl_service')->where([
										    		['c_lang',App::getLocale()],
										    		['fk_category_service_id',$data['cate_service']->pk_category_service_id]
										    		])
										    	 ->orderBy('pk_service_id','desc')->take(3)->get();
		    		if(count($data['skip_news'])==3){
		    		$data['list_news3'] = DB::table('tbl_service')->where([
		    			['c_lang',App::getLocale()],
		    			['fk_category_service_id',$data['cate_service']->pk_category_service_id],
		    			['pk_service_id','<',$data['skip_news'][2]->pk_service_id]
		    			])->orderBy('pk_service_id','desc')->simplePaginate(10);
		    		}
		    		else{$data['list_news3']=null;}
		    		$data['url'] ='dich-vu-phan-tich/'.$data['cate_service']->c_slug;
		    		$data['title'] = $data['cate_service']->c_name;	
		    		
		    		$data['folder_img'] = asset('public/upload/service');
		    	}
		    	else {return back();}

		    		
		    		
				
    			break;
    		case 'dich-vu-khac':
    			$data['cate_other'] = DB::table('tbl_category_other')->where([
																	['c_lang',App::getLocale()],
																	['c_slug',$kind]
																	])			
																->first();
															
				if($data['cate_other']!=null){
					$data['list_news1'] = DB::table('tbl_other')->where([
										    		['c_lang',App::getLocale()],
										    		['fk_category_other_id',$data['cate_other']->pk_category_other_id]
										    		])
										    	 ->orderBy('pk_other_id','desc')->first();
		    		$data['list_news2'] = DB::table('tbl_other')->where([
										    		['c_lang',App::getLocale()],
										    		['fk_category_other_id',$data['cate_other']->pk_category_other_id]
										    		])
										    	 ->orderBy('pk_other_id','desc')->skip(1)->take(2)->get();
		    		$data['skip_news'] = DB::table('tbl_other')->where([
										    		['c_lang',App::getLocale()],
										    		['fk_category_other_id',$data['cate_other']->pk_category_other_id]
										    		])
										    	 ->orderBy('pk_other_id','desc')->take(3)->get();
		    		if(count($data['skip_news'])==3){
		    		$data['list_news3'] = DB::table('tbl_other')->where([
		    			['c_lang',App::getLocale()],
		    			['fk_category_other_id',$data['cate_other']->pk_category_other_id],
		    			['pk_other_id','<',$data['skip_news'][2]->pk_other_id]
		    			])->orderBy('pk_other_id','desc')->simplePaginate(10);
		    		}
		    		else{$data['list_news3']=null;}
		    		$data['url'] ='dich-vu-khac/'.$data['cate_other']->c_slug;
		    		$data['title'] = $data['cate_other']->c_name;
		    		$data['folder_img'] = asset('public/upload/other');
				}
				else {return back();}
    			break;
    		default:
    			return redirect(url(App::getLocale()));
    			break;
    	}

    	return view('pages.list_news_1',$data);

    }
    public function detail_news($locale,$cate,$kind,$slug){  
        if($locale!='vn'&&$locale!='en'){$locale='vn';}  	
    	App::setLocale($locale);
    	$data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
    	if($data['hot_news1']!=null){
	    	$data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';	 
	    	 $data['title'] = $data['hot_news1']->c_name;  
		}

    	$data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
        if($data['hot_news2']!=null){
    	   $data['title'] = $data['hot_news2']->c_name; 
        }

    	$data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
    	if($data['hot_news3']!=null){
    		$data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
    		$data['title'] = $data['hot_news3']->c_name; 
    	}

    	$data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
    	if($data['hot_news4']!=null){
    		$data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
    		$data['title'] = $data['hot_news4']->c_name; 
    	}

    	$data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
    	if($data['hot_news5']!=null){
    		$data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
    		$data['title'] = $data['hot_news5']->c_name; 
    	}
    	switch ($cate) {
    		case 'tin-tuc':

    			$data['detail'] = DB::table('tbl_news')->where([['c_lang',App::getLocale()],['c_slug',$slug]])->first();
    			if($data['detail']!=null){
                    $session_name = $cate.'-'.$data['detail']->pk_news_id;
                    $check_view=Session::get($session_name);
                    if(empty($check_view)){
                        Session::put($session_name,1);
                        DB::table('tbl_news')->where('c_slug',$slug)->increment('c_view');
                    }
    				$kind_news = $data['detail']->c_category_news;

    				if($kind_news==1) $data['kind']='tin-trong-nuoc'; else $data['kind']='tin-quoc-te';
    			
	    			$data['title'] = $data['detail']->c_name;
	    			$data['relate'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->skip(RAND(3,7))->take(3)->get();
	    			$data['relate2'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->skip(RAND(7,15))->take(3)->get();
	    			$data['link'] = url(App::getLocale()).'/tin-tuc'.'/'.$data['kind'];	
    			}
    			else return back();
    			break;
    		case 'nghien-cuu-khoa-hoc':
    			$data['detail'] = DB::table('tbl_science')->where([['c_lang',App::getLocale()],['c_slug',$slug]])->first();
    			if($data['detail']!=null){
                    $session_name = $cate.'-'.$data['detail']->pk_science_id;
                    $check_view=Session::get($session_name);
                    if(empty($check_view)){
                        Session::put($session_name,1);
                        DB::table('tbl_science')->where('c_slug',$slug)->increment('c_view');
                    }
	    			$data['title'] = $data['detail']->c_name;
	    			$data['relate'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->skip(RAND(3,7))->take(3)->get();
	    			$data['relate2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->skip(RAND(7,15))->take(3)->get();
	    			$data['folder_img'] = asset('public/upload/science');
	    			$data['link'] = url(App::getLocale()).'/nghien-cuu-khoa-hoc/bai-viet';
	    		}
    			else return back();
				break;	
    		case 'dich-vu-phan-tich':
    			$data['detail'] = DB::table('tbl_service')->where([['c_lang',App::getLocale()],['c_slug',$slug]])->first();
    			if($data['detail']!=null){
	    			$session_name = $cate.'-'.$data['detail']->pk_service_id;
                    $check_view=Session::get($session_name);
                    if(empty($check_view)){
                        Session::put($session_name,1);
                        DB::table('tbl_service')->where('c_slug',$slug)->increment('c_view');
                    }
                    $data['cate_service'] = DB::table('tbl_category_service')->where([
																		['c_lang',App::getLocale()],
																		['pk_category_service_id',$data['detail']->fk_category_service_id]
																		])			
																	->first();
																	
	    			$data['title'] = $data['detail']->c_name;
	    			$data['relate'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->skip(RAND(3,7))->take(3)->get();
	    			$data['relate2'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->skip(RAND(7,15))->take(3)->get();
	    			$data['folder_img'] = asset('public/upload/service');
	    			$data['link'] = url(App::getLocale()).'/dich-vu-phan-tich'.'/'.$data['cate_service']->c_slug;
	    		}
    			else return back();	
    			break;
    		case 'dich-vu-khac':
				$data['detail'] = DB::table('tbl_other')->where([['c_lang',App::getLocale()],['c_slug',$slug]])->first();
				if($data['detail']!=null){
                    $session_name = $cate.'-'.$data['detail']->pk_other_id;
                    $check_view=Session::get($session_name);
                    if(empty($check_view)){
                        Session::put($session_name,1);
                        DB::table('tbl_other')->where('c_slug',$slug)->increment('c_view');
                    }
	    			$data['cate_other'] = DB::table('tbl_category_other')->where([
																		['c_lang',App::getLocale()],
																		['pk_category_other_id',$data['detail']->fk_category_other_id]
																		])			
																	->first();
																	
	    			$data['title'] = $data['detail']->c_name;
	    			$data['relate'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->skip(RAND(3,7))->take(3)->get();
	    			$data['relate2'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->skip(RAND(7,15))->take(3)->get();
	    			$data['folder_img'] = asset('public/upload/other');
	    			$data['link'] = url(App::getLocale()).'/dich-vu-khac'.'/'.$data['cate_other']->c_slug;
	    		}
    			else return back();	
				break;
			case 'gioi-thieu':
				$data['detail'] = DB::table('tbl_about')->where([['c_lang',App::getLocale()],['c_slug',$slug]])->first();
				if($data['detail']!=null){
                    $session_name = $cate.'-'.$data['detail']->pk_about_id;
                    $check_view=Session::get($session_name);
                    if(empty($check_view)){
                        Session::put($session_name,1);
                        DB::table('tbl_about')->where('c_slug',$slug)->increment('c_view');
                    }
	    			$data['cate_about'] = DB::table('tbl_category_about')->where([
																		['c_lang',App::getLocale()],
																		['pk_category_about_id',$data['detail']->fk_category_about_id]
																		])			
																	->first();
																	
	    			$data['title'] = $data['detail']->c_name;
	    			$data['relate'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->skip(RAND(3,7))->take(3)->get();
	    			$data['relate2'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->skip(RAND(7,15))->take(3)->get();
	    			$data['folder_img'] = asset('public/upload/about');
	    			$data['link'] = url(App::getLocale()).'/gioi-thieu'.'/'.$data['cate_about']->c_slug;
	    		}
    			else return back();	
				break;	
    		default:
    			return back();
    			break;
    	}
    	
    	return view('pages.detail_news',$data);
    }
    public function qa($locale){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
        App::setLocale($locale);
        $data['qa'] = DB::table('tbl_qa')->where([['c_lang',App::getLocale()],['c_status',1]])->simplePaginate(3);
        return view('pages.q_a',$data);
    }
    public function postQa(Request $request){
    
        $name = $request->input('template-contactform-name');
        $email = $request->input('template-contactform-email');
        $message = $request->input('template-contactform-message');
        $lang = App::getLocale();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("d-m-Y");
        $token = $request->input('g-recaptcha-response');
        if($token){
            DB::insert(DB::raw("insert tbl_qa set c_name=:name, c_email=:email, c_question=:question,c_date=:date, c_lang=:lang"),array('name'=>$name,'email'=>$email,'question'=>$message,'date'=>$date,'lang'=>$lang));
        }                    
    }
    public function contact($locale){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
        App::setLocale($locale);
        $data['profile'] = DB::table('tbl_profile')->where('c_lang',App::getLocale())->first();
        return view('pages.contact',$data);
    }
    public function postContact(Request $request){
    
        $name = $request->input('template-contactform-name');
        $email = $request->input('template-contactform-email');
        $subject = $request->input('template-contactform-subject');
        $message = $request->input('template-contactform-message');
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("d-m-Y");
        $token = $request->input('g-recaptcha-response');
        if($token){
            
            DB::insert(DB::raw("insert tbl_contact set c_name=:name, c_email=:email,c_subject=:subject, c_content=:message, c_date=:date"),array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message,'date'=>$date));
        }                    
    }
    public function search($locale,Request $request){
        if($locale!='vn'&&$locale!='en'){$locale='vn';}
        App::setLocale($locale);
        $data['hot_news1'] = DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('pk_news_id','desc')->first();
        if($data['hot_news1']!=null){
            $data['hot_news1']->c_category_news==1 ? $data['cate_hot_news1']='tin-trong-nuoc' : $data['cate_hot_news1']='tin-quoc-te';   
             $data['title'] = $data['hot_news1']->c_name;  
        }

        $data['hot_news2'] = DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('pk_science_id','desc')->first();
        if($data['hot_news2']!=null){
           $data['title'] = $data['hot_news2']->c_name; 
        }

        $data['hot_news3'] = DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('pk_service_id','desc')->first();
        if($data['hot_news3']!=null){
            $data['cate_hot_news3']=DB::table('tbl_category_service')->where('pk_category_service_id',$data['hot_news3']->fk_category_service_id)->first();
            $data['title'] = $data['hot_news3']->c_name; 
        }

        $data['hot_news4'] = DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('pk_other_id','desc')->first();
        if($data['hot_news4']!=null){
            $data['cate_hot_news4']=DB::table('tbl_category_other')->where('pk_category_other_id',$data['hot_news4']->fk_category_other_id)->first();
            $data['title'] = $data['hot_news4']->c_name; 
        }

        $data['hot_news5'] = DB::table('tbl_about')->where('c_lang',App::getLocale())->orderBy('pk_about_id','desc')->first();
        if($data['hot_news5']!=null){
            $data['cate_hot_news5']=DB::table('tbl_category_about')->where('pk_category_about_id',$data['hot_news5']->fk_category_about_id)->first();
            $data['title'] = $data['hot_news5']->c_name; 
        }
        $keyword = $request->get('q');
        // ($request->has('page'))?$from=$request->get('page'):$from=1;        
        $limit = 20;
        // $fromto= ($from-1)*$limit;
        $query = DB::select(DB::raw("(SELECT 'tintuc' AS type, c_name AS name, c_description AS description, c_img AS img, c_date AS day, c_slug AS slug, c_category_news AS category FROM tbl_news WHERE c_name LIKE :key1 OR c_description LIKE :key2 ORDER BY pk_news_id DESC)
            UNION
            (SELECT 'khoahoc', c_name, c_description, c_img, c_date, c_slug, 'NULL' FROM tbl_science WHERE c_name LIKE :key3 OR c_description LIKE :key4 ORDER BY pk_science_id DESC)
            UNION
            (SELECT 'dichvu',c_name,c_description,c_img,c_date,c_slug,fk_category_service_id FROM tbl_service WHERE c_name LIKE :key5 OR c_description LIKE :key6 ORDER BY pk_service_id DESC)
            UNION
            (SELECT 'khac',c_name,c_description,c_img,c_date,c_slug,fk_category_other_id FROM tbl_other WHERE c_name LIKE :key7 OR c_description LIKE :key8 ORDER BY pk_other_id DESC)
            UNION
            (SELECT 'gioithieu',c_name,c_description,c_img,c_date,c_slug,fk_category_about_id FROM tbl_about WHERE c_name LIKE :key9 OR c_description LIKE :key10 ORDER BY pk_about_id DESC )"),array('key1'=>'%'.$keyword.'%','key2'=>'%'.$keyword.'%','key3'=>'%'.$keyword.'%','key4'=>'%'.$keyword.'%','key5'=>'%'.$keyword.'%','key6'=>'%'.$keyword.'%','key7'=>'%'.$keyword.'%','key8'=>'%'.$keyword.'%','key9'=>'%'.$keyword.'%','key10'=>'%'.$keyword.'%',));
        $data['num'] = count($query);
        $data['search'] = new \Illuminate\Pagination\Paginator($query,$limit,$request->get('page'));
        $data['search']->setPath(url(App::getLocale().'/tim-kiem'));
        
        $data['keyword'] = $keyword;        
                 
        
        return view('pages.search',$data);
    }

}
