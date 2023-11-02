<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;


class NewsManager extends Controller
{
    public function showNews(){

        $news = DB::table("news")->get();
        $user = Auth::user();

        return view("NewsCreator", ["news" => $news, "user" => $user]);
    }

    public function CreateNews(Request $request)
    {
         if (Auth::user()->role == "admin") {
                    // Voer validatie uit op de invoer van het formulier
              $request->validate([
              'title' => 'required|string|max:255',
              'content' => 'required|string',
              'bierimage' => 'image|mimes:png,jpg,jpeg', // Aanpassen aan je behoeften
          ]);

                $news = new News();
                $news->Title = $request->input("title");
                $news->Content = $request->input("content");
                $news->Publishing_date = now();
                $news->user_id = Auth::user()->id;

                if ($request->hasFile('newsImage')) {
                    $image = $request->file('newsImage');
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time() . '.' . $extension;
                    $image->move(public_path('images'), $imageName);
                    $news->Cover_Image = $imageName;

                $news->save();

                return redirect()->route('showNews')->with('success', 'Nieuwsbericht is toegevoegd!');


            }else{
                return redirect()->route('showNews')->with('error', 'Alleen beheerders kunnen nieuwsberichten toevoegen.');
            }
        }
    }

    public function showUpdateNews($id){
        $user = Auth::user();
        if($user->role == "admin"){
            $news = News::find($id);

            if($news){
                return view("NewsUpdate", compact("news"));
            }
        }
    }

    public function UpdateNewsPost(Request $request, $id) {
        $user = Auth::user();

        if ($user->role == "admin") {
            if ($request->hasFile('Cover_Image')) {
                $request->validate([
                    'Title' => 'required',
                    'Content' => 'required',
                    'Cover_Image' => 'image|mimes:png,PNG,jpg,jpeg,png,JPG,JPEG',
                ]);

                $news = News::find($id);

                if (!$news) {
                    return redirect()->route('your.error.route')->with('error', 'News not found');
                }

                $image = $request->file('Cover_Image');
                $extension = $image->getClientOriginalExtension(); // Get the file extension
                $imageName = time() . '.' . $extension; // Generate a unique image name
                $image->move(public_path("images"), $imageName); // Store the image in the 'public/images' directory

                $news->Title = $request->Title;
                $news->Content = $request->Content;
                $news->Cover_Image = $imageName; // Assign the generated image name

                $news->save();

                return redirect()->route('UpdateNews', ['id' => $id]); // Redirect back to the update page
            } else {
                $request->validate([
                    'Title' => 'required',
                    'Content' => 'required',
                ]);

                $news = News::find($id);

                if (!$news) {
                    return redirect()->route('your.error.route')->with('error', 'News not found');
                }

                $news->Title = $request->Title;
                $news->Content = $request->Content;

                $news->save();

                return redirect()->route('UpdateNews', ['id' => $id]); // Redirect back to the update page
            }
        }
    }

    public function DeleteNews($id){
        $user = Auth::user();

        if($user->role == "admin"){
            $news = News::find($id);

            if($news){
                $news->delete();

                return redirect()->route('showNews')->with('success', 'Nieuwsbericht is verwijderd.');
            }else{
                return redirect()->route('showNews')->with('error', 'Nieuwsbericht niet gevonden.');
            }
        }else{
            return redirect()->route('showNews')->with('error', 'Alleen beheerders kunnen nieuwsberichten verwijderen.');
        }
    }
}
