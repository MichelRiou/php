<?php

class Input extends HtmlTag
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $value;
    /**
     * @var string
     */
    private $label;


    /**
     * Input constructor.
     * @param string $type
     * @param string $name
     * @param string|null $label
     * @internal param string $value
     * @internal param array $attributes
     */
    public function __construct($type, $name, $label = null, $value = "", $attributes = [])
    {
        $this->type = $type;
        $this->name = $name;
        $this->valeur = $value;
        $this->label = $label ?? $name;

        $this->attributes["value"] = $value;
        $this->attributes["name"] = $name;
        $this->attributes["type"] = $type;

        parent::__construct("input", "", $attributes, true);

    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Input
     */
    public function setType(string $type): Input
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Input
     */
    public function setName(string $name): Input
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Input
     */
    public function setValue(string $value): Input
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Input
     */
    public function setLabel(string $label): Input
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $html="<div>";
        $html .= "<label> ".$this->label. "<br>";
        $html .= parent::__toString();
        $html.="</label>";
        $html.="<div>";

        return $html;
    }


}