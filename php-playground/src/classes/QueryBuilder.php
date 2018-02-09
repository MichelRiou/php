<?php

class QueryBuilder
{
    /**
     * @var string
     */
    private $select;
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $where;
    /**
     * @var array
     */
    private $order=[];
    /**
     * @var integer
     */
    private $limit;
    /**
     * @var integer
     */
    private $offset;

    /**
     * @param int $limit
     * @return QueryBuilder
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param int $offset
     * @return QueryBuilder
     */
    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param array $sort
     * @return QueryBuilder
     */
    public function order(array $sort): self
    {
        foreach ($sort as $field => $direction) {
            array_push($this->order, "$field $direction");
        }
        return $this;
    }

    /**
     * @param string $tableName
     * @return QueryBuilder
     */
    public function from(string $tableName): self
    {
        $this->from = $tableName;
        return $this;

    }

    /**
     * @param string $condition
     * @return QueryBuilder
     */
    public function andWhere(string $condition): self
    {
        $this->where .= " AND ($condition)";
        return $this;
    }

    /**
     * @param string $condition
     * @return QueryBuilder
     */
    public function orWhere(string $condition): self
    {
        $this->where .= " OR ($condition)";
        return $this;
    }

    /**
     * @param string $condition
     * @return QueryBuilder
     */
    public function where(string $condition): self
    {
        $this->where = "($condition)";
        return $this;
    }
    // ... signifie n arguments  et :self type par lui même Typage possible mais non obligatoire

    /**
     * @param string[] ...$fields
     * @return QueryBuilder
     */

    public function select(string ...$fields): self
    {                      // Même nom function et attribut No problemo
        $this->select = implode(",", $fields);
        return $this;

    }

    /**
     * @return string
     */
    public function getSQL(): string
    {
        $sql = "SELECT " . $this->select;
        $sql .= " FROM " . $this->from;

        if (!empty ($this->where)) {
            $sql .= $this->where;
        }
        if (count($this->order)>0){                         // Array donc test tableau pas vide
            $sql.=" ORDER BY ".implode(',',$this->order);
        }
        if ($this->limit>0){
            $sql.=" LIMIT ". $this->limit;
            if ($this->offset>0){
                $sql.=" OFFSET ". $this->offset;
            }
        }
        return $sql;
    }
}