<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('pages.backend.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Mark as read when viewed
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        return view('pages.backend.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Pesan kontak berhasil dihapus!');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['status' => 'read']);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Pesan ditandai sudah dibaca!');
    }

    public function markAsUnread(Contact $contact)
    {
        $contact->update(['status' => 'unread']);

        return redirect()
            ->route('contacts.index')
            ->with('success', 'Pesan ditandai belum dibaca!');
    }
}

