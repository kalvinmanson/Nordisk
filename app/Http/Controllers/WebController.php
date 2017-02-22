<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Auth;
use Storage;
use File;
use App\Category;
use App\Field;
use App\Page;
use App\Picture;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //home
    public function index()
    {
        $posts = Page::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $videos = Page::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(1);
        return view('web/index', compact('posts', 'videos'));
    }
    //Show Map
    public function map() {
        return view('web/map');     
    }
    //Show category
    public function category($slug)
    {
        $country = $this->country();
        $category = Category::where('slug', $slug)->firstOrFail();
        $pages = Page::where('category_id', $category->id)->where('country', $country)->orderBy('created_at', 'desc')->paginate(6);

        if (view()->exists('web/category-'.$slug)) {
            return view('web/category-'.$slug, compact('category', 'pages', 'blocks'));
        } else {
            return view('web/category', compact('category', 'pages', 'blocks'));
        }
    }
    //Show Page
    public function page($category, $slug)
    {
        $country = $this->country();
        $page = Page::where('slug', $slug)->firstOrFail();

        if (view()->exists('web.page-cat-'.$category)) {
            return view('web/page-cat-'.$category, compact('page', 'blocks'));
        } else {
            return view('web/page', compact('page', 'blocks'));
        }
    }
    // Send email
    public function contact(Request $request) {
        if($request->method() == "POST") {

            $data = [
                        'data' => [
                            'name'=>$request->name, 
                            'email'=>$request->email,
                            'celphone'=>$request->celphone,
                            'subject'=>$request->subject,
                            'content'=>$request->content
                        ]
                    ];
            Mail::send('emails.contact', $data, function ($message) {
                $message->from('no-reply@droni.co', 'No Reply | Drodmin');
                $message->subject("Contacto Web Drodmin");
                $message->to('kalvinmanson@gmail.com')->cc('gustavo.barragan@musculocreativo.com.co');
            });
            return view('web/contact_thanks');

        } else {
            return view('web/contact');
        }
    }
}
