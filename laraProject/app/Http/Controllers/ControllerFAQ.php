<?php

namespace App\Http\Controllers;
use App\Models\Resources\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AggiornamentoFaqRequest;


class ControllerFAQ extends Controller {

    protected $_faqModel;

    public function __construct() {
        $this->_faqModel = new FAQ;
        
    }
    
    public function update(AggiornamentoFaqRequest $request, $id){
      
        $faq= FAQ::find($id);
        $faq->fill($request->validated());
        $faq->domanda=$request->domanda;
        $faq->risposta=$request->risposta;
        $faq->save();
  

    return redirect('gestioneFAQ');
}
}
