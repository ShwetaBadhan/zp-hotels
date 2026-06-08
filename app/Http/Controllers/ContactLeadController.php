<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactLead;
use Illuminate\Support\Facades\Http;
class ContactLeadController extends Controller
{

    // to show all the leads
    public function index()
    {
        $leads = ContactLead::latest()->get();
        return view('backend.pages.admin-contact-leads', compact('leads'));
    }


    // To store  all the leads
    public function store(Request $request)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            try {
                $recaptcha = $request->input('g-recaptcha-response');

                $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $recaptcha,
                    'remoteip' => $request->ip(),
                ]);

                $result = $response->json();

                if (!$result['success'] || $result['score'] < 0.5) {
                    return response()->json([
                        'success' => false,
                        'message' => 'reCAPTCHA verification failed. Please try again.'
                    ], 422);
                }
                $request->validate([
                    'name' => [
                        'required',
                        'regex:/^[a-zA-Z\s\.\-]{2,255}$/'
                    ],
                    'email' => 'required|email',
                    'phone' => [
                        'required',
                        'regex:/^[6-9]\d{9}$/'
                    ],
                    'check_in' => 'required|date|after_or_equal:today',
                    'check_out' => 'required|date|after:check_in',
                    'enuiry_for' => 'required|string',
                    'message' => [
                        'nullable',
                        'max:5000',
                        'regex:/^(?!.*(<|>|script|onload|onclick|javascript:)).*$/i'
                    ],
                ]);

                ContactLead::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'enuiry_for' => $request->enuiry_for,
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                    'message' => $request->message,
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us, We will get back to you soon!'
                ], 200);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong. Please try again.'
                ], 500);
            }
        }

        // Normal form submission (fallback)
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s\.\-]{2,255}$/'],
            'email' => ['required', 'regex:/^[^<>{}()*$!;:=\[\]]+$/'],
            'phone' => ['required', 'regex:/^[6-9]\d{9}$/'],
            'message' => ['nullable', 'max:5000', 'regex:/^(?!.*(<|>|script|onload|onclick|javascript:)).*$/i'],
        ]);

        ContactLead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'enquiry_for' => $request->enquiry_for,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'message' => $request->message,
            'ip' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'Thank you for contacting us, We will get back to you soon!');
    }
    public function destroy(ContactLead $lead)
    {
        $lead->delete();
        return redirect()->back()->with('success', 'Lead deleted successfully!');
    }

}
