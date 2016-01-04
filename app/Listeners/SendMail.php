<?php namespace App\Listeners;

use App\Events\UserRegister;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class SendMail {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRegister  $event
	 * @return void
	 */
	public function handle(UserRegister $event)
	{
//		dd('email send');
		$data = $event->user->attributesToArray();
		Mail::queue('email', $data ,function($message) use ($data)
		{
			$message->to($data['email'], $data['f_name'])
					->subject('You are active user now');
		});
	}

}
