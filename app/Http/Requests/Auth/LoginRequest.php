<?php

namespace App\Http\Requests\Auth;

use App\Models\Usuario;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class LoginRequest extends FormRequest implements Authenticatable
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'usuario' => ['required', 'string'], // Cambiado de 'email' a 'usuario'
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
// ...
public function authenticate(): void
{

    //dd(bcrypt('12345678'));
    $this->ensureIsNotRateLimited();

    $credentials = [
        'usuario' => $this->input('usuario'),
        'password' => $this->input('password'),
    ];

    if (!Auth::attempt($credentials)) {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'usuario' => trans('auth.failed'),
        ]);
    }

    RateLimiter::clear($this->throttleKey());
}


// ...

    
    

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'usuario' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('usuario')) . '|' . $this->ip());
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->input('id'); // Debes ajustar esto según tu lógica
    }

    public function getAuthPassword()
    {
        return $this->input('password'); // Debes ajustar esto según tu lógica
    }
    public function getRememberToken()
    {
        return null; // O la lógica adecuada si estás utilizando recordar sesión
    }

    public function setRememberToken($value)
    {
        // Puedes no hacer nada o lanzar una excepción, dependiendo de tus necesidades
    }

    public function getRememberTokenName()
    {
        return null; // O el nombre del campo si estás utilizando recordar sesión
    }
}
 