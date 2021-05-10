<?php


class Destinations
{
    protected $id;
    protected string $location;
    protected  int $price;
    protected int $id_tour_operator;
    protected string $img;
    protected string $descri;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return string
     */
    public function getDescri(): string
    {
        return $this->descri;
    }

    /**
     * @param string $descri
     */
    public function setDescri(string $descri): void
    {
        $this->descri = $descri;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getIdTourOperator()
    {
        return $this->id_tour_operator;
    }

    /**
     * @param mixed $id_tour_operator
     */
    public function setId_tour_operator($id_tour_operator): void
    {
        $this->id_tour_operator = $id_tour_operator;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}