<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

use App\Models\Report; // Assuming you have a Report model
use Illuminate\Support\Facades\Http;

class ReportController extends Controller
{
    function create()
    {
        return view('report_form');
    }

    function store(Request $request)
    {
        // Validate and store the report data
            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'help_topic' => 'required|string|max:255',
            'issue_summary' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'g-recaptcha-response' => 'required'
        ]);

        //recaptcha v2 validation 
        if (!$this->validateRecaptchaV2($request->input('g-recaptcha-response'))) {
            return back()->with('error', 'Captcha Verification Fail!. Please try again.');
        }
        //upload the attachment if it exists
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }
        // Generate a unique ticket number
        $ticketNumber = 'CSIRT-' . strtoupper(Str::random(6));
        // Store the report in the database

        $report = new Report();
        $report->ticket_number = $ticketNumber;
        $report->name = $request->name;
        $report->email = $request->email;
        $report->phone = $request->phone;
        $report->help_topic = $request->help_topic;
        $report->issue_summary = $request->issue_summary;
        $report->attachment = $attachmentPath;
        $report->status = 'baru';
        $report->save();

        // Redirect back to the form with a success message
        return redirect()->route('report.create')->with('success', 'Report submitted successfully!');        
    }

    public function adminDashboard(Request $request)
    {
        // Logic to display the admin dashboard
        $query = Report::query();
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $reports = $query->orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('reports'));
    }

    public function edit($id)
    {
        // Logic to edit a report
        $report = Report::findOrFail($id);
        return view('admin.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai'
        ]);
        // Logic to update a report
        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return redirect()->route('admin.dashboard')->with('success', 'Report updated successfully!');
    }

    public function checkTiketForm()
    {
        // Logic to display the ticket check form
        return view('ticket.check');
    }

    public function checkTiket(Request $request)
    {
        // Logic to check the ticket status
        $request->validate([
            'ticket_number' => 'required|string|max:255',
        ]);

        

        $report = Report::where('ticket_number', $request->ticket_number)->first();

        if (!$report) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }
if (!$this->validateRecaptchaV2($request->input('g-recaptcha-response'))) {
            return back()->with('error', 'Captcha Verification Fail!. Please try again.');
        }
        return view('ticket.result', compact('report'));
    }

    private function validateRecaptchaV2($token)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        return $response->json('success');
    }
}
