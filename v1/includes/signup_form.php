
<h2>Sign up!</h2>

    <form action="http://localhost/Ind_Up_API\v1\users\registrer.php" method="POST">
        <input type="text" name="username" placeholder="username" /><br />
        <input type="password" name="password" placeholder="password" /><br />
        
        <input type="submit" value="Registrera!" />
    </form>

<h2>Log in</h2>
    <form action="http://localhost/Ind_Up_API\v1\users\login.php" method="POST">
        <input type="text" name="username" placeholder="username" /><br />
        <input type="password" name="password" placeholder="password" /><br />
        <input type="hidden" name="user_id">
        <input type="submit" value="Logga in!" />
    </form>
