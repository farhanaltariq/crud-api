<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function send(){
        $details = [
            'title' => 'Test Kirim Email',
            'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia veritatis neque accusamus ex, tempora velit dolor nemo suscipit dignissimos nesciunt odio officia laborum nihil. Veritatis saepe ad praesentium odio delectus hic. Eaque, a dolor, nesciunt consequuntur debitis repellat aperiam fugiat commodi recusandae nulla mollitia animi assumenda quas unde ullam qui?"
        ];

        try{
            \Mail::to('xseen111@gmail.com')->send(new \App\Mail\TestMail($details));
        } catch(\Exception $e){
            echo "Email gagal terkirim karena $e";
        }
    }
}
