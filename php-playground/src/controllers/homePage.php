<h1>HOMEPAGE</h1>

<?php
?>
<p>
    <?= $user->getUserName() ?>
    <?php echo $user->getUserName(); ?>
    <?php
    $title = new HtmlTag("h1", "Hello again", ["style" => "color:red"]);
    print_r($title);
    echo $title;
    $link = new HtmlLink("index.php?r=inscription", "lien");
    print_r($link);
    echo $link;
    $link2 = new HtmlTag("a", "autre lien", ["href" => "index.php?r=inscription"]);
    print_r($link2);
    echo $link2;
    $input = new Input("text", "userName", "Name");
    print_r($input);
    echo $input;
    $joe = new PersonDTO();
    $joe->setFirstName("Joe")->setName("User")->setAge(29);
    $form = new Form();
    $form->addInput(new Input("text", "firstName", "Prénom"))
        ->addInput(new Input("text", "name", "Nom"))
        ->addInput(new Input("number", "age", "Age"))
        ->setDto($joe);

    echo $form;
    ?>
</p>
