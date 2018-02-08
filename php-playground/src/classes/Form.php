<?php


class Form extends HtmlTag
{
    /**
     * @var string
     */
    private $method;
    /**
     * @var string
     */
    private $action;
    /**
     * @var Input[]
     */
    private $inputList = [];
    /**
     * @var object
     */
    private $dto;   // Pas dans le constructeur donc non obligaoire mais on crée Setter et Getter


    /**
     * Form constructor.
     * @param string $method
     * @param string $action
     */
    public function __construct($method = "post", $action = null, $attributes = [])
    {
        $this->method = $method;
        $this->action = $action;

        $attributes["method"] = $method;
        $attributes["action"] = $action;

        parent::__construct("form", "", $attributes);

    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Form
     */
    public function setMethod(string $method): Form
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return Form
     */
    public function setAction(string $action): Form
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return Input[]
     */
    public function getInputList(): array
    {
        return $this->inputList;
    }

    /**
     * @param Input[] $inputList
     * @return Form
     */
    public function setInputList(array $inputList): Form
    {
        $this->inputList = $inputList;
        return $this;
    }

    /**
     * @param Input $input
     */
    public function addInput(Input $input): Form
    {
        // array_push($this->inputList,$input);
        $this->inputList[$input->getName()] = $input;
        return $this;
    }

    private function renderInputs()
    {
        $html = "";
        foreach ($this->inputList as $name => $value) {
            $html .= $value;  // Grace a la magique __toString !!
        }
        return $html;
    }

    public function __toString()                    //invocation de __toString lors de l'echo
    {
        $content = $this->renderInputs();
        $content .= "<button type=\"submit\" name=\"submit\">Valider</button>";
        $this->content = $content;
        return parent::__toString();
    }

    /**
     * @return Object
     */
    public function getDto()
    {
        return $this->dto;
    }

    private function hydrateForm()
    {
        print_r($this->inputList);
        echo"<br>";
        foreach ($this->inputList as $key => $val) {                    //Tableau d'objets $key=nom de obj et $val=l'objet
            $methodName = "get" . ucfirst($key);                        //
            echo ("apres ucfirst ==========>".$methodName."<br>");
            print_r($this->dto);
            if (method_exists($this->dto, $methodName)) {               // Si grace à setDto,
                echo ("methode après méthode exists==========>". $this->dto->$methodName());
                $val->setValue($this->dto->$methodName());

            }
        }
    }

    /**
     * @param Object $dto
     * @return Form
     */
    public function setDto($dto): Form
    {
        $this->dto = $dto;
        $this->hydrateForm();
        return $this;
    }

}