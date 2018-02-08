<h1>HOME</h1>

<?php
?>
<p>
<?= $user->getUserName() ?>
<?php echo $user->getUserName();?>
<?php
$title = new HtmlTag("h1","Hello again",["style"=>"color:red"]);
print_r($title);
echo $title;
$link = new HtmlLink("index.php?r=inscription","lien");
echo $link;
$link = new HtmlTag("a","autre lien",["href"=>"index.php?r=inscription"]);
echo $link;
?>
</p>

