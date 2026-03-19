<form method="post" action="/auth/login">
    <?= csrf_field() ?>
    <?= isset($error) ? $error : '' ?>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
<a href="/auth/register">Don't have an account? Register</a>