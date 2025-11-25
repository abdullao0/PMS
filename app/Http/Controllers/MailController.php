<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ActiveProductsReportEmail;
use App\Mail\ContactEmail;
use App\Mail\UnactiveProductsReportEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            return redirect('shopdashboard');

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

            return redirect('shopdashboard');

        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function Contact(StoreContactRequest $request)
    {
        try {
            $ValidatedData = $request->validated();
            Contact::create($ValidatedData);
            Mail::to($ValidatedData['email'])->send(new ContactEmail($ValidatedData));
           
            return redirect('index')-> with('message', 'We have recevied your message');
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
