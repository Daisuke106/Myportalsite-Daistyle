<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>確認コード入力</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    margin-bottom: 10px;
}

button {
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.2s;
}

button:hover {
    background-color: #0056b3;
}
</style>

</head>
<body>
<div class="container">
        <h1>確認コード入力</h1>
        <form method="post" action="process_signup.php">
            <!-- 確認コードを入力するフィールド -->
            <label for="confirmation_code">確認コード:</label>
            <input type="text" id="confirmation_code" name="confirmation_code" required>

            <!-- 他のフォームフィールド -->
            <!-- ... -->

            <button type="submit">登録</button>
        </form>
    </div>


<script>

</script>

</body>

</html>