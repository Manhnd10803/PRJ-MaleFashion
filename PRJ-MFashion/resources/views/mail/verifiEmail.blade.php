<div style="width=600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Hi, {{ $data['name'] }}</h2>
        <p>This email helps you to get your email authentication back</p>
        <p>Please click the link below to do it</p>
        <p><a href="{{ route('verifiEmail', ['email' => $data['email'], 'token' => $data['token']] ) }}">Email verification</a></p>
    </div>
</div>