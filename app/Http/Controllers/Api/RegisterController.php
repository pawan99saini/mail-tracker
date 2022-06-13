<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\MailTrack;
use Validator;


class RegisterController extends Controller
{
    //
    public function checkregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mobile' => 'required|digits:10|numeric',
        ]);
        $data = $request->all();
        if($validator->fails()){
            return sendError('Validation Error.', $validator->errors());       
        }
        else{
            $result = Lead::where(['email'=>$data['email'],'mobile'=>$data['mobile']])->first();
            if($result)
            {
                $find = MailTrack::where(['receiver_email'=>$result->email,'status'=>1])->first();
                $d = MailTrack::find($find->id);
                $d->register_status = 1;
                $d->save();
                return sendResponse([],'Status Updated.');
            }
            else{
                return sendError('Error.', 'Record not exist.');       

            }
        }

        }
}
