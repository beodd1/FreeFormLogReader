<?php var_dump($_POST); ?>
<form action="index.php" method="post">
Enter your name: <input type="text" name="file_" />
Enter your age: <input type="text" name="_file" />
<input type="submit" />
</form>
<?php var_dump($_POST['files_']); ?>