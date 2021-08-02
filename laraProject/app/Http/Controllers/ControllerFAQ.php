<?php

namespace App\Http\Controllers;
use App\Models\Resources\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ControllerFAQ extends Controller {

    protected $_faqModel;


    
    
    public function __construct() {
        $this->_faqModel = new FAQ;
        
    }
    
    public function update(Request $request, $id)
{
        $validator = Validator::make($request->all(), [
            'domanda' => 'required|string|max:255',
            'risposta' => 'required|string|max:255',
        ]);
        

        if ($validator->fails()) {
            return redirect()->route('modificafaq',[$id])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $faq= FAQ::find($id);
        $faq->domanda=$request->domanda;
        $faq->risposta=$request->risposta;
        $faq->save();
  

    return redirect('gestioneFAQ');
}
}
