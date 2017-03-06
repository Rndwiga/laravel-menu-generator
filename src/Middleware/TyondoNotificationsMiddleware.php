<?php

namespace Tyondo\MenuGenerator\Middleware;


use Closure;
use Notification;
use Tyondo\Notifications\Notifications\ConfirmEmailNotification;
use Tyondo\Notifications\Helpers\TyondoNotificationsHelper;
use Illuminate\Support\Facades\Auth;

class TyondoNotificationsMiddleware
{
    /**
     * @var Illuminate\Contracts\Auth\Guard
     */
    protected $auth;
    protected $user;

    /**
     * Create a new UserHasPermission instance.
     *
     * @param TyondoNotificationsHelper $tyondoNotificationsHelper
     * @param mixed
     */
    public function __construct(TyondoNotificationsHelper $tyondoNotificationsHelper)
    {
        //$this->auth = $auth;
        $this->tyondoNotificationsHelper = $tyondoNotificationsHelper;

    }

    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $this->user = config('tyondo_notifications.options.model')::find(Auth::user()->id);
            if (!$this->user->activated) {
                $this->tyondoNotificationsHelper->sendActivationMail($this->user);
                auth()->logout();
                //return back()->with('activationWarning', true);
                return redirect('/')->with('status', 'You have not activated your account. Please check your email');
            }
            if ($this->user->is_active == 0) {
                auth()->logout();
                //return redirect($this->redirectPath());
                return redirect('/')->with('status', 'You have not activated your account. Please check your email');
            }
            $this->tyondoNotificationsHelper->newLogin($request->ip(), $this->user);
            return back();
        }

        return $next($request);
    }
}
