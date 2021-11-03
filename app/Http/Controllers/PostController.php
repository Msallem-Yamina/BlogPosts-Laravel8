<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $p = Post::orderBy('id', 'Desc')->get();
        if (Auth::user()->role != 'client'){
            return redirect ('/home');
        }
        return view('Client.myposts');//->with('posts', $p);
    }

    public function profile (){
      if (Auth::user()->role == 'client'){
        return view('Profile');
      }else{
        return view ('Admin.profile');
      }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addpost()
    {
        if (Auth::user()->role != 'client'){
            return redirect ('/home');
        }
        return view ('Client.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         // Validation 
    //   $request->validate([
    //     'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
    //   ]); 

      // reponse mel input 
      $file = $request->file('image');
   
      //Display File Name (ism l fichier)
    //   echo 'File Name: '.$file->getClientOriginalName();
    //   echo '<br>';
   
      //Display File Extension
    //   echo 'File Extension: '.$file->getClientOriginalExtension();
    //   echo '<br>';
   
      //Display File Real Path (win mawjouda fl pc mta3na)
    //   echo 'File Real Path: '.$file->getRealPath();
    //   echo '<br>';
   
      //Display File Size
    //   echo 'File Size: '.$file->getSize();
    //   echo '<br>';
   
      //Display File Mime Type
    //   echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
      $destinationPath = 'uploads'; // par defaut yefhim eli hya mahtouta ta7t l public

        // si bech najoutiw nefs lphoto lazemna nesta3mlou uniqid bech maybadlelnech nom li9dim y7ot nom men aandou jdid.

    $newName = uniqid().".".$file->getClientOriginalExtension();
      
      // yekhou name mta3ha w ba3d move yaani y7awelha Lel destinationPath( uploads)
    //   $file->move($destinationPath,$file->getClientOriginalName());

      // nbadlouu loriginal name b new name eli sna3neh jdid

        $file->move($destinationPath,$newName);

        // dd($request);
         $p = new Post();
         $p->title = $request->title;
         $p->description = $request->description;
        //  $p->image = $file->getClientOriginalName();
        $p->image = $newName;
         $p->createur = Auth::user()->id;
         $p->category = $request->category;
        
         $p->save();
         return redirect('/client/allposts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
      $p = Post::find($id);

      return view ('post')->with('post', $p); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $p = find ($id);

    }

    public function deletepost ($id){
      $p = Post::find($id)-> delete();
      return redirect ('/client/allposts');
      }

    public function postlist(){
      $posts = Post::orderBy('created_at','desc')->get();
      return view ('Admin.posts')->with('posts', $posts);
    }
    
}
