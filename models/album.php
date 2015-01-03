<?php
class Album extends Model
{
	var $table = 'album';
    public $id;
    public $title;
    public $releasedate;

    private $Artist;
	
    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setReleasedate($releasedate)
    {
        $this->releasedate = $releasedate;

        return $this;
    }

    public function getReleasedate()
    {
        return $this->releasedate;
    }
	
	public function getLast($num =24)
	{	
		return $this->find(array(
			'limit' => $num,
			'order' => 'Releasedate DESC'
		));
	}
}

