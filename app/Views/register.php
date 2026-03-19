<form method="post" action="/auth/register">
    <?= csrf_field() ?>
    <?= isset($validation) ? $validation->listErrors() : '' ?>
    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Register</button>
</form>
<a href="/auth/login">Already have an account? Login</a>