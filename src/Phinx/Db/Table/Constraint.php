<?php
/**
 * Created by PhpStorm.
 * User: phper
 * Date: 2016/05/11
 * Time: 17:48
 *
 * @package    Phinx
 * @subpackage Phinx\Db
 * @author     inaka-phper <inaka.phper@gmail.com>
 */

namespace Phinx\Db\Table;


class Constraint
{
    /**
     * @var string
     */
    protected $type = 'UNIQUE';

    /**
     * @var null|string
     */
    protected $name = null;

    /**
     * @var array
     */
    protected $columns;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Constraint
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Constraint
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param mixed $columns
     * @return Constraint
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * Utility method that maps an array of index options to this objects methods.
     *
     * @param array $options Options
     * @throws \RuntimeException
     * @return Index
     */
    public function setOptions($options)
    {
        // Valid Options
        $validOptions = array('type', 'name', 'columns');
        foreach ($options as $option => $value) {
            if (!in_array($option, $validOptions)) {
                throw new \RuntimeException('\'' . $option . '\' is not a valid index option.');
            }

            $method = 'set' . ucfirst($option);
            $this->$method($value);
        }
    }

}