<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $p= Post::all();
        $c = Comment::all();

        if(Auth::user()->role=='admin'){

            return view ('Admin.Dashboard')->with('posts',$p)
                                            ->with('comments', $c);
        }else{
            return view ('Client.Dashboard');
        }
    }

     /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function changePassword(Request $request)
    {       
        //   dd($request);
       
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        elseif(strcmp($request->current_password, $request->new_password) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'same:password_confirmation'],
            'password_confirmation' => ['required'],
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    
    }

    
    public function editProfile(Request $request){

        //  dd($request);
        $file = $request->file('image');
        $destinationPath = 'avatar';
        $newName = uniqid().".".$file->getClientOriginalExtension();
        $file->move($destinationPath,$newName);

        $u = User::find(Auth::user()->id);
        $u -> name = $request-> name;
        $u -> adresse = $request-> adresse;
        $u -> numberphone = $request-> numberphone;
        $u -> image = $newName;

        $u -> update();
        return redirect()->back();

    }
    public function listeUsers(){

        $u = User::where ('role','client')
                   ->orderBy('created_at','desc')
                   ->paginate(3);
        return view ('Admin.users')->with('users',$u);
    }

}
