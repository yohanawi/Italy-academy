<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    /**
     * Display a listing of contact submissions
     */
    public function index(Request $request)
    {
        $query = ContactSubmission::query();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $submissions = $query->latest()->paginate(20);

        // Get counts for status badges
        $counts = [
            'all' => ContactSubmission::count(),
            'new' => ContactSubmission::new()->count(),
            'read' => ContactSubmission::read()->count(),
            'replied' => ContactSubmission::replied()->count(),
        ];

        return view('admin.contact-submissions.index', compact('submissions', 'counts'));
    }

    /**
     * Display the specified contact submission
     */
    public function show(ContactSubmission $contactSubmission)
    {
        // Mark as read if it's new
        if ($contactSubmission->status === 'new') {
            $contactSubmission->markAsRead();
        }

        return view('admin.contact-submissions.show', compact('contactSubmission'));
    }

    /**
     * Update the status of the submission
     */
    public function updateStatus(Request $request, ContactSubmission $contactSubmission)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied',
        ]);

        $contactSubmission->update($validated);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    /**
     * Remove the specified contact submission
     */
    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();

        return redirect()->route('admin.contact-submissions.index')->with('success', 'Contact submission deleted successfully!');
    }
}
