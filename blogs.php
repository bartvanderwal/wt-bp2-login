<h1>Blog items</h1>
<form method="GET" action="index.php" >
    <input type="text" name="titel">
    <input type="radio" name="datum" value="true">
    <input type="radio" name="datum" value="false">
    <button type="submit">filter</button>
</form>

<form method="POST" action="acties/insertblog.php">
    <input type="text" id="titel" name="titel" value="Testing" placeholder="titel"/>
    <input type="body" id="body" name="body" value="Lorem ipsum" placeholder="body..." size="40"/>
    <input type="submit" value="Posten"/>
</form>
<?= blogsAlsMooieHtmlTabel(getBlogs($titelFilter, '', true, true)); ?>
<pre>
    titelFilter: <?= $titelFilter ?>
    $sorterenOpDatum <?= $sorterenOpDatum ?>
</pre>