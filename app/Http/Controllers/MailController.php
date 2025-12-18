<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ActiveProductsReportEmail;
use App\Mail\ContactEmail;
use App\Mail\UnactiveProductsReportEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function activeproducts()
    {
        try {

            $products = Auth::user()
                ->shop
                ->products()
                ->where('isActive', true)
                ->get() ?? collect();

            $email = Auth::user()->email;

            Mail::to($email)->send(new ActiveProductsReportEmail($products));

            return redirect('shopdashboard')->with('message', 'Active Products Report Sent successfully');

        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function unactiveproducts()
    {
        try {

            $products = Auth::user()
                ->shop
                ->products()
                ->where('isActive', false)
                ->get() ?? collect();

            $email = Auth::user()->email;

            Mail::to($email)->send(new UnactiveProductsReportEmail($products));

            return redirect('shopdashboard')->with('message', 'Unactive Products Report Sent successfully');

        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function Contact(StoreContactRequest $request)
    {
        try {
            $ValidatedData = $request->validated();
            if($ValidatedData['email']  )
            Contact::create($ValidatedData);
            // Mail::to($ValidatedData['email'])->send(new ContactEmail($ValidatedData));
               
            // Send request to n8n webhook
            Http::withHeaders(['Content-Type' => 'application/json'])
            ->post('https://ppmmss.app.n8n.cloud/webhook/support', $ValidatedData);

           
            return redirect('index')-> with('message', 'We have recevied your message');
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function ContactApi(StoreContactRequest $request)
    {
        try {
            $ValidatedData = $request->validated();
            Contact::create($ValidatedData);
            Mail::to($ValidatedData['email'])->send(new ContactEmail($ValidatedData));
               
            // Send request to n8n webhook
            // mafi faida 
            Http::post('http://localhost:5678/webhook-test/support', $ValidatedData);

           
            return response()->json($ValidatedData);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
