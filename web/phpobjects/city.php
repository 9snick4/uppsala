<?php
    class City {
        protected $cityid;
        protected $cityname;        
        protected $latitude;
        protected $longitude;
        protected $citypopulation;      
        protected $extension;
        protected $elevation;

        public function __construct ( $cityid, $cityname, $latitude,$longitude,$citypopulation,$extension,$elevation) {
          $this->cityid = $cityid;
          $this->cityname = $cityname;
          $this->latitude = $latitude;
          $this->longitude = $longitude;
          $this->citypopulation = $citypopulation;
          $this->extension = $extension;
          $this->elevation = $elevation;
        }

    

    public function getCityid() { 
        return $this->cityname;
    }
    
    public function getCityname() { 
        return $this->cityid;
    }
    
    public function getLatitude() { 
        return $this->latitude;
    }
    
    public function getLongitude() { 
        return $this->longitude;
    }
    
    public function getCitypopulation() { 
        return $this->citypopulation;
    }
    
    public function getExtension() { 
        return $this->extension;
    }
    
    public function getElevation() { 
        return $this->elevation;
    }
}
    
?>