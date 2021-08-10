<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Photo;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Models\Contact;
use App\Models\ProjectDetail;
use Mail;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         
    }

     public function index()
    {
        
        $image = Photo::with('media')
                     ->where('gallery_type','=','carousel')
                     ->get();
        $carousels = array();
             
        foreach($image as $im) {
            $image_name = $im->image;
            $model_id = $image_name['id'];
            $file_name = $image_name['file_name'];
            $media_url = Storage::url($model_id."/".$file_name);
            $img_path = url('/')."/storage/".$model_id."/".$file_name;
            array_push($carousels,$img_path);
        }
         

        return view('index', compact('carousels'));
        
    }

    public function about()
    {
       
        return view('about');
        
    }

    public function projects()
    {
        

        $ongoing = ProjectDetail::with('media')
                     ->where('type','=','ONGOING')
                     ->whereNull('deleted_at')
                     ->get();        
        foreach ($ongoing as $ong){ 
            foreach ($ong->media as $ong1) {      
                $model_id = $ong1->id;
                $file_name = $ong1->file_name;
                $media_url = Storage::url($model_id."/".$file_name);
                $img_path = url('/')."/storage/".$model_id."/".$file_name;
                $ong1->name = $img_path;
            }
           // echo "<pre>"; print_r($ong);die();
        }
        $completed = ProjectDetail::with('media')
                     ->where('type','=','COMPLETED')
                     ->whereNull('deleted_at')
                     ->get();        

        foreach ($completed as $cmp){ 
            foreach ($cmp->media as $cmp1) {      
                $model_id = $cmp1->id;
                $file_name = $cmp1->file_name;
                $media_url = Storage::url($model_id."/".$file_name);
                $img_path = url('/')."/storage/".$model_id."/".$file_name;
                $cmp1->name = $img_path;
            }
           // echo "<pre>"; print_r($ong);die();
        }
        
        
        //echo "<pre>";print_r($ongoing);die();
        return view('projects', compact('ongoing','completed'));
        
    }

    public function photogallery()
    {

        $image = Photo::with('media')
                     ->where('gallery_type','=','gallery')
                     ->get();
        $gallery = array();
             
        foreach($image as $im) {
            $image_name = $im->image;
            $model_id = $image_name['id'];
            $file_name = $image_name['file_name'];
            $media_url = Storage::url($model_id."/".$file_name);
            $img_path = url('/')."/storage/".$model_id."/".$file_name;
            array_push($gallery,$img_path);
        }


       
        return view('photogallery', compact('gallery'));
        
    }

 public function contact()
    {
          return view('contact'); 
    }


    public function contactStore(Request $request) {
        
        $dt = $request->all();
        $url = 'https://www.google.com/recaptcha/api/siteverify';
         $arrayku = array();
        $arrayku['secret'] = '6Let7LIUAAAAAKRQwJA2_pp4SO4uxkEEI9I6V-ze';
        $arrayku['response'] = trim($dt['g-recaptcha-response']);
        $dataku = http_build_query($arrayku);
        $respon_google = shell_exec('curl -s -L -X POST "https://www.google.com/recaptcha/api/siteverify" --data "'.$dataku.'" --max-time 10 --compressed');
        $array_respon = json_decode($respon_google, true);
       // echo "<pre>";print_r($array_respon);die();
         if($array_respon['success']) {
        $contact = Contact::create($request->all());
   
        $arrData                    = array(
                                            'name'          =>$dt['name'],
                                            'email'       =>$dt['email'],
                                            'mobile'    =>$dt['mobile'],
                                            'subject'       =>'Nanthiat Builders Contact : '.$request->name,
                                            'message'       =>$dt['message'],
                                            'tomail'        =>'nanthiatbuilders@gmail.com'
                                        );
        Mail::send('emails.contactus', ['arrData' => $arrData], function ($m) use ($arrData) 
            {
                $m->from($arrData['email'], $arrData['name']);
                $m->to(['nanthiatbuilders@gmail.com','vishnu@onlinemediaspace.com'], 'Nanthiat Builders')->subject('Nanthiat Builders Contact Us');
               
            });
        return redirect()->route('contacts.thankyou');
        }
        else {
         return redirect()->route('contacts.index');
        }

    }

     public function thankyou()
    {
          return view('thankyou'); 
    }



}