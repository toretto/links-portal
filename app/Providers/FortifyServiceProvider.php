<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use App\Notifications\LoginNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::registerView(function () { return view('auth.register');});
        Fortify::loginView(function () { return view('auth.login');});
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::requestPasswordResetLinkView(function () { return view('auth.forgot-password');});
        Fortify::confirmPasswordView(function () { return view('auth.confirm-password');});
        Fortify::resetPasswordView(function (Request $request) { return view('auth.reset-password', ['request' => $request]);;});
        Fortify::twoFactorChallengeView(function () { return view('auth.two-factor-challenge');});
        Fortify::authenticateUsing(function(Request $request) {
            $user = User::where('email', $request->email)->first();
            $admins = User::whereRelation('role','is_admin',1)->get();

            if ($user && Hash::check($request->password, $user->password)) {
                $ip = $_SERVER['REMOTE_ADDR'];
                Notification::sendNow($admins, new LoginNotification($user, $ip));
                return $user;
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
