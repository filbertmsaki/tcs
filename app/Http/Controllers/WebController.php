<?php

namespace App\Http\Controllers;

use App\Mail\MemberRegistered;
use App\Models\Member;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class WebController extends Controller
{
    public function migrateAndSeed()
    {
        Artisan::call('migrate:fresh', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);
        return response()->json(['message' => 'Database migration and seeding completed successfully.']);
    }
    public function index()
    {
        return view('web.index');
    }
    public function about()
    {
        return view('web.about');
    }
    public function events()
    {
        return view('web.events');
    }
    public function gallery()
    {
        return view('web.gallery');
    }
    public function contact()
    {
        return view('web.contact');
    }
    public function members()
    {
        return view('web.members');
    }
    public function member_registration()
    {
        return view('web.member-registration');
    }
    public function member_registration_store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^255\d{9}$/',
            'email' => 'required|email|max:255',
            'mct_number' => 'nullable|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'date_of_birth' => 'required|date_format:m/d/Y',
            'qualification' => 'required|string|max:255',
            'qualified_year' => 'nullable|date_format:m/d/Y',
            'sub_speciality_qualification' => 'nullable|string|max:255',
            'college_attained' => 'required|string',
            'membership_type' => 'required|string|in:Ordinary Members,Associate Members,Honorary Members,International Members,Corporate Members',
            'agreeCheck' => 'accepted'
        ]);
        $existingContact = Member::where('phone', $request->input('phone'))
            ->orWhere('email', $request->input('email'))
            ->first();
        if ($existingContact) {
            return redirect()->back()->withErrors(['error' => 'Member with this phone or email already exists.']);
        }
        // Convert date format if needed
        $validated['date_of_birth'] = Carbon::createFromFormat('m/d/Y', $validated['date_of_birth'])->format('Y-m-d');
        if (!empty($validated['qualified_year'])) {
            $validated['qualified_year'] = Carbon::createFromFormat('m/d/Y', $validated['qualified_year'])->format('Y-m-d');
        }
        $member = Member::create($validated);
        // Attempt to send email
        try {
            Mail::to($member->email)->send(new MemberRegistered($member));
        } catch (Exception $e) {
            // Log the error for further investigation
            Log::error('Failed to send registration email', ['error' => $e->getMessage()]);
            $signedUrl = URL::signedRoute('member_registration_show', ['id' => $member->id]);

            // Optionally, you can set a flash message indicating email sending failure
            return redirect($signedUrl)->with('success', 'Form submitted successfully, but there was an issue sending the email.');
        }

        // Generate a signed URL for the member's details page
        $signedUrl = URL::signedRoute('member_registration_show', ['id' => $member->id]);

        // Redirect to the member details page with the signed URL
        return redirect($signedUrl)->with('success', 'Form submitted successfully and email sent.');
    }

    public function member_registration_show($id)
    {
        $member = Member::where('id', $id)->first();
        if ($member) {
            return view('web.membership-detail',compact('member'));
        }
        return redirect()->route('member_registration');
    }
}
