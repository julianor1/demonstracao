<?php

//header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

namespace App\Http\Controllers;

use File;
use FFMpeg;
use Storage;
use DateTime;
use Input;
use DB;
use Hash;
use Auth;
use Mail;
use Redirect;
use Image;
use Illuminate\Http\Request;


class ApiTesteController extends Controller {

    public function __construct() {

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function apiTokeniza() {

       return 'teste';
    }
    
     public function gravarFotoAvatar(Request $request,$id) {
        $name_avatar = 'user-'.$id.'.jpg';
        
        $upload = Storage::disk('uploads')->put('avatars',$request->image);

        $image1 = $request->file('image')->storeAs('','user-' . $id . ".jpg",'avatars');       
        //
        if($upload){
            
            //aqui gravaria no banco o caminho da foto 
        }
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload ) {
            return 'Falha ao fazer upload';
        }
        return $name_avatar;
    }    
}
