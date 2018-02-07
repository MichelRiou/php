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
     * Form constructor.
     * @param string $method
     * @param string $action
     */
    public function __construct($method, $action, $attributes = [])
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
    public function addInput(Input $input)
    {
        // array_push($this->inputList,$input);
        $this->inputList[$input->getName()] = $input;

    }


}