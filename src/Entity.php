<?php
namespace App;

class Entity
{
    /**
     * Serializa o objeto para ser exposto na API.
     * Se for necessário para atender um caso especial, pode ser sobrescrito na classe da entidade.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $reflect =  new \ReflectionClass($this);
        $properties = $reflect->getProperties();

        $serialized = [];

        foreach ($properties as $property) {
            $methodName = 'get' . ucwords($property->name);
            if (method_exists($this, $methodName)) {
                $value = $this->{$methodName}();
                if (is_a($value, 'DateTime')) {
                    $value = $value->format('Y-m-d H:i:s');
                }
                $serialized[$property->name] = $value;
            }
        }

        return $serialized;
    }

    public static function fromArray($properties)
    {
        $instance = new static;
        foreach ($properties as $property => $value) {
            $methodName = 'set' . ucwords($property);
            if (method_exists(static::class, $methodName)) {
                $instance->{$methodName}($value);
            }
        }

        return $instance;
    }
}
