    <h2>Kategorie hinzufügen</h2>

<form method="post">

<? include ('cat_form.php'); ?>

<input type="hidden" name="do" value="cat_new" />
</form>

<hr /><p><a class="backlink button" href="<?=doadminlink("cat_list");?>">Zurück</a></p>