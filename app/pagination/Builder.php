<?php

namespace App\pagination;

use App\pagination\Meta;

class Builder
{
    /**
     * @var
     */
    protected $builder;

    /**
     * bulider constructor.
     * @param $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     *
     * @param int $page
     * @param int $perPage
     */
    public function paginate($page = 1, $perPage = 10)
    {
        $page = max(1, $page);
        $total = $this->builder->execute()->rowCount();
        $result = $this->builder
            ->setFirstResult($this->getResultIndex($page, $perPage))
            ->setMaxResults($perPage)
            ->execute()
            ->fetchAll();
        $meta = new Meta($page, $perPage, $total);
    }

    /**
     * @param $page
     * @param $perPage
     * @return float|int
     */
    protected function getResultIndex($page, $perPage)
    {
        return ($page - 1) * $perPage;
    }

}