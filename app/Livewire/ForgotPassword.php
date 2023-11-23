<?php

namespace App\Livewire;

use App\Mail\VerificationCode;
use App\Models\ForgotPassword as ModelsForgotPassword;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;
use Livewire\Attributes\Reactive;

class ForgotPassword extends Component
{
    #[Rule('required|email')]
    public $email;

    public $user;

    public $verificationCode;
    public $rememberToken;

    public $verify = false;
    public $passwordBox;

    public $code = '';
    public $newPassword = '';

    function mount()
    {
    }

    public function resetPassword()
    {
        $this->validate();

        $this->user = Player::where('email', $this->email)->first();
        if (!$this->user->email = '') {
            $this->verificationCode = rand(100000, 999999);
            $this->rememberToken = Str::random(32);

            $data = [
                'name' => $this->user->name,
                'code' => $this->verificationCode,
                'token' => $this->rememberToken,
            ];

            Mail::to($this->user->email)->send(new VerificationCode($data));
            $password_reset = ModelsForgotPassword::create([
                'user_id' => $this->user->id,
                'email' => $this->email,
                'reset_code' => $this->verificationCode,
                'remember_token' => $this->rememberToken,
                'status' => 1, // Not verified
            ]);
            $password_reset->save();
            $this->verifyCheck();
        } else {
            $this->addError('email', 'Your email is not registered');
        }
    }

    function verifyCheck()
    {
        if ($this->rememberToken) {
            $this->verify = true;
        } else {
            $this->verify = false;
        }
    }

    function passwordCheck()
    {
        $this->verify = true;
        $this->passwordBox = true;
    }

    function submitVerification()
    {
        if ($this->code) {
            $password_reset = ModelsForgotPassword::where('remember_token', $this->rememberToken)->first();
            if ($this->code == $password_reset->reset_code && $this->rememberToken == $password_reset->remember_token) {
                $this->passwordCheck();
            } else {
                $this->addError('code', 'Your verification code is invalid.');
            }
        } else {
            $this->addError('code', 'Please enter your verification code.');
        }
    }

    function updatePassword()
    {
        if (!$this->newPassword == '') {
            $this->validate([
                'newPassword' => 'required|min:4',
            ]);
            $passwordVerify = ModelsForgotPassword::where('remember_token', $this->rememberToken)->first();
            $passwordVerify->status = 0;
            $user = Player::find($passwordVerify->user_id);
            $user->password = Hash::make($this->newPassword);
            $passwordVerify->save();
            $user->save();

            $this->redirect('/santa-login');
        } else {
            $this->addError('newPassword', 'Your way is wrong!!');
        }
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
