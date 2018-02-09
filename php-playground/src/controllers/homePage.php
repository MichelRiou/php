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
    $joe = new PersonDTO();   // Pourquoi pas de construct??????
    $joe->setFirstName("Joe")->setName("User")->setAge(29);   //Chaque setter retourne $this donc le -> suivant porte sur $this modifié
    $form = new Form();
    $form->addInput(new Input("text", "firstName", "Prénom"))
        ->addInput(new Input("text", "name", "Nom"))
        ->addInput(new Input("number", "age", "Age"))
        ->setDto($joe);

    echo $form;
    $qb = new QueryBuilder();
    echo $qb->select("name", "firstName", "age,sex")
        ->from("persons")
        ->where("sex='f' and age<18")
        ->orWhere("sex='m' and age <12")
        ->order(['name'=>'ASC','firstName'=>'DESC'])
        ->limit(5)
        ->offset(10)
    ->getSQL();

    echo "<br>";
    $text="15/08/2005";
    $text2="2005-12-31";
    $regexp="/^(1|2)[0-9]{3}-(0?[1-9]|1[0-2])-([0-2]?[0-9]|3[0-1])$/";
    echo preg_match($regexp,$text2,$ar);
    var_dump($ar);
    $tel="06-12-00-15-24";
    $telmatch="/^0[6-7]([-. ]?[0-9]{2}){4}$/";
    $rp="[-. ]";
    echo preg_replace($rp,"t",$tel);

    ?>
</p>
