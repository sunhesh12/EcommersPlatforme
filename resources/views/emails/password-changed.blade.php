<h2>Hello {{ $user->name }},</h2>

<p>This is a confirmation that your password was recently changed.</p>

<p>If you made this change, no further action is needed.</p>

<p>If you did not change your password, please <a href="{{ route('password.request') }}">reset your password immediately </a> or contact support.</p>

<p>Thank you,<br>Your Website Team</p>
