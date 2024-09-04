<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $contacts = Contact::query()
            ->select('id', 'name', 'surname', 'email', 'subject', 'message', 'read_unread')
            ->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function edit(int $id)
    {
        $contact = Contact::query()->where('id', $id)->first();
        if ($contact->read_unread == 0) {
            Contact::query()->where('id', $id)->update(['read_unread' => 1]);
        }
        return view('admin.contact.edit', compact('contact'));
    }


    /**
     * @param ContactRequest $request
     * @param Mail $mail
     * @return string|RedirectResponse
     */
    public function update(ContactRequest $request, Mail $mail): string|RedirectResponse
    {
        try {
            $mail::send('email.send_message', ['msg' => $request->answer], function ($message) use ($request) {
                $message->to($request->email, $request->name . '' . $request->surname)->subject('Cavab');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

            });
            toastr()->success('Your message has been sent successfully');
            return redirect()->route('admin.contact.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }


    /**
     * @param Contact $contact
     * @return string|RedirectResponse
     */
    public function destroy(Contact $contact): string|RedirectResponse
    {
        try {
            $contact->delete();
            toastr()->success('Data successfully deleted');
            return redirect()->route('admin.contact.index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
