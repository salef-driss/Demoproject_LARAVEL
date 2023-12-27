<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQCategorie;
use App\Models\FAQQuestions;
use Illuminate\Support\Facades\Auth;

class FAQManager extends Controller
{
    public function showFAQCategorie()
    {
        $user = Auth::user();

        if($user){
            $faqCategories = FAQCategorie::all();
            return view("FAQCategorie", [
                "faqCategories" => $faqCategories,
            ]);
        }
    }

    public function createFAQ(Request $request){


        $user = Auth::user();

        if($user->role == "admin"){
            $request-> validate([
                "CategorieName" => "required"
            ]);

            $FAQCategorie = new FAQCategorie();

            $FAQCategorie->CategorieName = $request->CategorieName;
            $FAQCategorie->user_id = auth()->id();

            $FAQCategorie->save();

            return redirect()->route('FAQCategorie')->with('success', 'Beer has been added!');
        }else{
            $errorText = "User cant add FAQ category's. User is not a Admin";
        }

    }


    public function DeleteFAQ(Request $request, $id){
        $FaqCategorie = FAQCategorie::find($id);

        if(!$FaqCategorie){
            $errorText = "Cant Delete this item";
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Categorie');
        }


        $FaqCategorie->delete();

        return redirect()->route('FAQCategorie')->with('success', 'Successfuly deleted FAQ Category');
    }


    public function FAQUpdateGet(Request $request , $id){
        $UpdateFAQ = FAQCategorie::find($id);

        if(!$UpdateFAQ){
            $errorText = "Cant find this categorie";
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Categorie');
        }

        return view("FAQCateUpdate" , ["FAQUpdate" => $UpdateFAQ]);
    }

    public function FAQUpdatePOST(Request $request , $id){
        $UpdateFAQ = FAQCategorie::find($id);

        if(!$UpdateFAQ){
            $errorText = "Cant find this categorie";
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Categorie');
        }

        $request-> validate([
            "TitleFAQ_Update" => "required"
        ]);

        $UpdateFAQ->CategorieName = $request->TitleFAQ_Update;

        $UpdateFAQ->save();

        return redirect()->route('FAQUpdateGET', ['id' => $id])->with('success', 'Successfuly updated title');

    }


    public function showFAQQuestions(Request $request , $id){

        $Questions = FAQQuestions::where('FaQCategorie_id', $id)->get();

        $category = FAQCategorie::find($id);

        if(!$Questions){
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Categorie');
        }

        return view("FAQQUESTION" , ["questions" => $Questions , "category" =>  $category])->with('success', 'Successfuly updated title');
    }


    public function FAQQuestionDelete(Request $request , $id){

        $Question = FAQQuestions::find($id);
        $categoryId = $Question->FaQCategorie_id;

        $categorie = FAQCategorie::find($categoryId);

        $category = $categorie;


        $questions = FAQQuestions::where('FaQCategorie_id', $categoryId)->get();

        if(!$Question){
            $errorText = "Cant Delete this item";
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Question');
        }

        $Question->delete();
        // dd($Questions);

        return back()->with("id", "questions"  , "category" );
    }


    public function FAQCreate(Request $request , $id){
        $user = Auth::user();

        if($user->role == "admin"){
            $request-> validate([
                "TitleFAQQuestion" => "required",
                "contextFAQ" => "required"
            ]);

            $FAQQuestion = new FAQQuestions();

            $FAQQuestion->question_Title = $request->TitleFAQQuestion;
            $FAQQuestion->question_content = $request->contextFAQ;
            $FAQQuestion->FaQCategorie_id = $id;


            $FAQQuestion->save();

            return back();
        }else{
            $errorText = "User cant add FAQ. User is not a Admin";
        }

    }


    public function FAQQuestionUpdateShow($id){

        $UpdatedFAQ = FAQQuestions::find($id);

        if(!$UpdatedFAQ){
            $errorText = "Cant find this FAQ";
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Categorie');
        }

        return view("FAQQuestion_Update" , ["UpdatedFAQ" => $UpdatedFAQ]);
    }


    public function FAQQuestionUpdatePOST(Request $request , $id){

        $UdateFAQPost = FAQQuestions::find($id);

        if(!$UdateFAQPost){
            $errorText = "Cant find this categorie";
            return redirect()->route('FAQCategorie')->with('error', 'Cant find this Categorie');
        }

        $request->validate([
            "FAQTitle" => "required",
            "contextFAQ" => "required"
        ]);

        $UdateFAQPost->question_Title = $request->FAQTitle;
        $UdateFAQPost->question_content = $request->contextFAQ;

        $UdateFAQPost->save();

        return redirect()->route('FAQQuestion_Update_show', ['id' => $id])->with('success', 'Successfuly updated FAQ');
    }
}
