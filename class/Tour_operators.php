<?php


class Tour_operators
{

    protected  $id;
    protected $name;
    protected $grade;
    protected $link;
    protected  $is_premium;
    protected $logo;


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
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade( $grade): void
    {
        if ($grade == null){
            return;
        }else{
            $this->grade = $grade;
        }
    }

    /**
     * @return string
     */
    public function getLink(): string
    {


        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return int
     */
    public function isIsPremium(): int
    {
        return $this->is_premium;
    }

    /**
     * @param int $is_premium
     */
    public function setIs_premium(int $is_premium): void
    {
        $this->is_premium = $is_premium;
    }



}