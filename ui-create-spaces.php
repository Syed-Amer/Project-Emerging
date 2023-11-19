<html>

<head>
    <title>Webex API</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>Create New Webex Space</h1>
    <div>
        <form method="post" action="create-space.php">
            <table>
                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                <tr>
                    <td>Space Name</td>
                    <td><input type="text" name="space_name"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" value="create">Create</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>