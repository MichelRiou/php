<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 06/02/2018
 * Time: 15:58
 */
class HtmlTag
{
    /**
     * @var string
     */
    protected $tagName;
    /**
     * @var string
     */
    protected $content;
    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var boolean
     */
    protected $autoClosed;

    /**
     * htmlTag constructor.
     * @param string $tagName
     * @param string $content
     * @param array $attributes
     * @param bool $autoClosed
     */
    public function __construct(string $tagName,
                                string $content = "",
                                array $attributes = [],
                                bool $autoClosed = false
    )
    {
        $this->tagName = $tagName;
        $this->content = $content;
        $this->attributes = $attributes;
        $this->autoClosed = $autoClosed;
    }

    /**
     * @return string
     */
    public function getTagName(): string
    {
        return $this->tagName;
    }

    /**
     * @param string $tagName
     * @return htmlTag
     */
    public function setTagName(string $tagName): htmlTag
    {
        $this->tagName = $tagName;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return htmlTag
     */
    public function setContent(string $content): htmlTag
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return htmlTag
     */
    public function setAttributes(array $attributes): HtmlTag
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAutoClosed(): bool
    {
        return $this->autoClosed;
    }

    /**
     * @param bool $autoClosed
     * @return htmlTag
     */
    public function setAutoClosed(bool $autoClosed): HtmlTag
    {
        $this->autoClosed = $autoClosed;
        return $this;
    }

    /**
     *
     */
    protected function getAttributesAsString()
    {
        $attributesString = "";
        foreach ($this->attributes as $attributeName => $attributeValue) {
            $attributesString .= " $attributeName=\"$attributeValue\"";
        }
        return $attributesString;
    }

    public function __toString()
    {
        $attributesList = $this->getAttributesAsString();
        $html = "<$this->tagName $attributesList >";
        if (!$this->autoClosed) {
            $html .= "$this->content </$this->tagName>";
        }
        return $html;
    }

}